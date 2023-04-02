<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Exception;


class GoogleController extends Controller
{

    // start google controller
    public function loginWithGoogle()
    {

        return Socialite::driver('google')->stateless()->redirect();
    }
    public function callbackfromGoogle()
    {

        try {
            $user = Socialite::driver('google')->stateless()->user();
            $is_user =  User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId(),
                    ],
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($user->getName() . '@' . $user->getId()),
                    ]
                );
                
            }
            else{
                $saveUser = User::where('email',$user->getEmail())->update(
                    [
                        'google_id' => $user->getId(),
                    
                    ] );
                    $saveUser= User::where('email',$user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //End controller

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();

            $findUser = User::where('facebook_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('my-facebook-password'),
                ]);

                Auth::login($newUser);
                return redirect('/home');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'There was a problem logging you in. Please try again later.');
        }
    }

    }


