<?php namespace Pool\Auth\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use Config;
use Sentinel;
use App\Http\Controllers\Controller;
use Pool\Auth\Models\User as UserModel;
use Pool\Auth\Models\Social as SocialModel;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Pool\Auth\Controllers\LoginController;

class RegistrationController extends Controller
{

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    /**
     * Function To google Login
     * @param type $data 
     */
    public function getSocialAuth($provider = null)
    {
        if (!config("services.$provider")) {
            abort('404'); //just to handle providers that doesn't exist
        }
        Config::set("services.$provider.redirect", route('auth.getSocialAuthCallback', $provider));
        return $this->socialite->with($provider)->redirect();
    }

    /**
     * Function To google Login CallBack
     * @param type $data
     */
    public function getSocialAuthCallback($provider = null)
    {
        if (Input::get('denied') != '') {
            return redirect()->to('/')->with('message', 'You did not share your profile data with our social app.');
        }
        Config::set("services.$provider.redirect", route('auth.getSocialAuthCallback', $provider));
        
        if ($user = $this->socialite->with($provider)->stateless()->user()) {            
            $activeUserid = $this->insertUserSocial($user, $provider);
            
            //Set Session For User Id And Redirect
            if (!empty($activeUserid)) {
                $setUser = Sentinel::findById($activeUserid);
                Sentinel::login($setUser);
                $login = new LoginController();
                return $login->afterLoginProcess();
            }
        } else {
            return Redirect::to('/');
        }
    }

    private function insertUserSocial($user, $provider)
    {
        if($user) {
            //Check is this email present
            $userCheck = UserModel::where('email', '=', $user->email)->first();
            if (!empty($userCheck)) {               
                return $userCheck->id;
            } else {
                $email = $user->email;
                $sameSocialId = SocialModel::where('social_id', '=', $user->id)
                                ->where('provider', '=', $provider )
                                ->first();                                
                if (empty($sameSocialId)) {
                    $name = explode(' ', $user->name);
                    $credentials = array(
                        'email'    => $email,
                        'password' => bcrypt(str_random(16)),
                        'first_name' => (count($name) >= 1) ? $name[0] : '',
                        'last_name' => (count($name) >= 2) ? $name[1] : '',
                        'last_login' => date('Y-m-d H:i:s')
                    );
                    $newuser = Sentinel::registerAndActivate($credentials);

                    $socialData = new SocialModel;
                    $socialData->user_id = $newuser->id;
                    $socialData->social_id = $user->id;
                    $socialData->provider= $provider;
                    $socialData->created_at = date('Y-m-d H:i:s');
                    $socialData->updated_at = date('Y-m-d H:i:s');
                    $socialData->save();

                    //Attaching Roles
                    $role = Sentinel::findRoleBySlug('registered');
                    $role->users()->attach($newuser);
                    return $newuser->id;
                } else {
                    //Load this existing social user
                    return $sameSocialId->user_id;
                }
            }
        }
        return null;
    }
}
