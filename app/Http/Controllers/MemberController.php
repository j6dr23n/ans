<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('pages.member.login');
    }
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();
            if ($user->email === null) {
                $key = Crypt::encryptString($user->id);
                return redirect()->route('member.login_manual', ['key' => $key]);
            }

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/')->with('success', 'Login Successfully');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'type' => 'free',
                    'password' => Hash::make('P@ssWord')
                ]);

                Auth::login($createUser);
                return redirect('/')->with('success', 'Account created successfully');
            }
        } catch (Exception $exception) {
            Log::alert($exception->getMessage());
            return redirect('/')->with('error', 'Something Wrong!!!');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);

                return redirect('/')->with('success', 'Login Successfully');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'type' => 'free',
                    'password' => Hash::make('P@ssWord')
                ]);

                Auth::login($createUser);
                return redirect('/')->with('success', 'Account created successfully');
            }
        } catch (Exception $e) {
            return redirect('/')->with('error',$e->getMessage() !== '' ? 'Error to login with google try with facebook instead!!!' : $e->getMessage());
        }
    }

    public function manual_view(Request $request)
    {
        if ($request->has('key')) {
            return view('pages.member.manual')->with('', 'You have to create your account manually!!!');
        }

        return redirect('/')->with('error', 'You don\'t have permission to create manual account');
    }

    public function manual_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = $request->all();
        try {
            $fb_id = Crypt::decryptString($data['fb_id']);
        } catch (DecryptException $e) {
            Log::alert($e->getMessage());
            return redirect('/')->with('error', 'Invalid key!!!');
        }

        $createUser = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'fb_id' => $fb_id,
                    'type' => 'free',
                    'dlcount' => 0,
                    'password' => Hash::make($data['password'])
                ]);
        if ($createUser) {
            return redirect('/')->with('success', 'Your account successfully created');
        }

        return redirect('/')->with('error', 'Something Wrong!!!');
    }
}
