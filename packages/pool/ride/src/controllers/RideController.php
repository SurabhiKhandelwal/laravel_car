<?php

namespace Pool\Ride\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;
use Validator;
use Sentinel;
use Pool\Ride\Models\Car as CarModel;
use Pool\Ride\Models\Ride as RideModel;

class RideController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offerRide() {
        $user = array();
        if (Sentinel::check()) {
            $user = Sentinel::getUser()->toArray();
        }
        return view('ride::offerRide.offer')->with('user', $user);
    }

    public function saveOfferRide(Request $request) {
        $data = $request->except('_token', 'hour', 'minute', 'meridian');
        //Validation rules for the form fields
        $rules = array(
            'offer_source' => 'required',
            'offer_destination' => 'required',
            'schedule_date' => 'required|date_format:m/d/Y|after:' . date('m/d/Y'),
            'scheduleTime' => 'required',
            'fare' => 'required|numeric',
            'seats' => 'required'
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        } else if (!Sentinel::check()) {
            return Redirect::back()->withInput()->withErrors(array('error' => 'Please login'));
        } else {
            $loggedUserID = Sentinel::getUser()->id;
            if (isset($data['schedule_date']) && strtotime($data['schedule_date']) && !empty($data['scheduleTime'])) {
                $data['schedule_date'] = date('Y-m-d H:i A', strtotime($data['schedule_date'] . ' ' . $data['scheduleTime']));
                unset($data['scheduleTime']);
            }
            $data['user_id'] = $loggedUserID;
            $car_detail = CarModel::where('user_id', $loggedUserID)->first();
            if (Sentinel::check() && empty($car_detail)) {
                $offer = json_encode($data);
                return Redirect::route('user.carDetail')->with('offer', $offer);
            }
            $data['source'] = $data['offer_source'];
            $data['destination'] = $data['offer_destination'];
            unset($data['offer_source'], $data['offer_destination']);
            RideModel::create($data);
            echo 'show detail form';exit;
           // return Redirect::route('award.detail.edit', $id)->with('message', 'Award created successfully.');
        }
    }

}
