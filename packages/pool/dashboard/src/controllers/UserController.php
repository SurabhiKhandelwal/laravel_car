<?php

namespace Pool\Dashboard\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;
use Sentinel;
use Validator;
use Pool\Ride\Models\Car as CarModel;
use Pool\Auth\Models\User as UserModel;
use Pool\Auth\Models\UserDetail as UserDetailModel;
use Pool\Ride\Models\Ride as RideModel;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Sentinel::check()) {
            $users = UserModel::paginate(3);
            return view('dashboard::user.list', compact('users'));
        }
    }

    /**
     * Function to save/update personal details
     * @param \Illuminate\Http\Request $request
     * @return type
     */
    public function profile(Request $request) {
        if (Sentinel::check() && Sentinel::inRole('registered')) {
            $input = $request->except('_token');
            $data = array_map('trim', $input);

            //Validation rules for the form fields
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'birth_year' => 'required',
                'phone_num' => 'required',
                'gender' => 'required',
                'notification' => 'required'
            );
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator->messages());
            } else {
                $user_array = array(
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name']
                );
                $user_id = Sentinel::getUser()->id;
                UserModel::find($user_id)->update($user_array);
                $this->saveUserDetail($data, $user_id);
                return Redirect::route('user.personal')->with('message', 'Personal details updated successfully');
            }
        }
    }

    /**
     * Function to save user detail
     * @param type $trimmed_array
     * @param type $user_id
     * @return type
     */
    private function saveUserDetail($trimmed_array, $user_id) {
        if ($trimmed_array && count($trimmed_array) && $user_id) {
            $data = array(
                'phone' => $trimmed_array['phone_num'],
                'birth_year' => $trimmed_array['birth_year'],
                'age' => ($trimmed_array['birth_year'] && strtotime($trimmed_array['birth_year']) ? (date('Y') - date('Y', strtotime($trimmed_array['birth_year']))) : ''),
                'notification_to_parents' => $trimmed_array['notification'],
                'image' => isset($trimmed_array['image']) ? $trimmed_array['image'] : '',
                'gender' => $trimmed_array['gender']
            );
            $user_detail = UserDetailModel::where('user_id', $user_id)->first();
            if ($user_detail && !empty($user_detail)) {
                $id = $user_detail->update($data);
            } else {
                $data['user_id'] = $user_id;
                $userDetail = UserDetailModel::create($data);
                $id = $userDetail->id;
            }
            return $id;
        }
    }

    /**
     * Function to get profile details
     * @return type
     */
    public function getProfile() {
        if (Sentinel::check() && Sentinel::inRole('registered')) {
            $user = Sentinel::getUser();
            $userDetail = UserDetailModel::where('user_id', $user->id)->first();
            return view('dashboard::partial.details', compact('user', 'userDetail'));
        }
    }

    /**
     * Function to get car detail
     * @return type
     */
    public function getCarDetail() {
        if (Sentinel::check() && Sentinel::inRole('registered')) {
            $user_id = Sentinel::getUser()->id;
            $carDetail = array();
            $carDetails = CarModel::where('user_id', $user_id)->first();
            if (isset($carDetails) && is_object($carDetails)) {
                $carDetail = $carDetails->toArray();
            }
            return view('dashboard::partial.car')->with('carDetail', $carDetail);
        }
    }

    /**
     * Function to save car detail
     * @param \Illuminate\Http\Request $request
     * @return type
     */
    public function saveCarDetail(Request $request) {
        if (Sentinel::check() && Sentinel::inRole('registered')) {
            $data = $request->except('_token');
            //Validation rules for the form fields
            $rules = array(
                'registration_number' => 'required',
                'number_plate' => 'required',
                'brand' => 'required',
                'model_name' => 'required'
            );
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator->messages());
            } else {
                $data['user_id'] = Sentinel::getUser()->id;
                if (isset($data['car_id']) && !empty($data['car_id'])) {
                    $car_id = $data['car_id'];
                    unset($data['car_id']);
                    CarModel::find($car_id)->update($data);
                } else {
                    CarModel::create($data);
                }
                if (isset($data['offer']) && !empty($data['offer'])) {
                    $offer_data = json_decode($data['offer']);
                    $this->rideAdd($offer_data);
                }
                return Redirect::route('user.carDetail')->with('message', 'Car details updated successfully.');
            }
        } else {
            return Redirect::to('/');
        }
    }

    private function rideAdd($offer_data) {
        if (count($offer_data)) {
            $offer_data->status = 0;
            // convert std class object to array
            $offerArray = is_object($offer_data) ? json_decode(json_encode($offer_data), True) : array();
            if (count($offerArray)) {
                $offerArray['source'] = $offerArray['offer_source'];
                $offerArray['destination'] = $offerArray['offer_destination'];
                unset($offerArray['offer_source'], $offerArray['offer_destination']);
                RideModel::create($offerArray);
            }
        }
        return null;
    }

}
