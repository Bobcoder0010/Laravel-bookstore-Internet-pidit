<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class SocialAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->statelsess()->user();
            $this->createOrLoginUser($user, 'google');
            return redirect()->intended('/home');
        } catch (Exception $e) {
            // Handle exception (e.g., log the error, show an error message, etc.)
            return redirect('/')->withErrors(['msg' => 'Unable to login with Google.']);
        }
    }

    // Redirect to Apple
    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }

    // Handle Apple callback
    public function handleAppleCallback()
    {
        try {
            $user = Socialite::driver('apple')->stateless()->user();
            $this->createOrLoginUser($user, 'apple');
            return redirect()->intended('/home');
        } catch (Exception $e) {
            // Handle exception (e.g., log the error, show an error message, etc.)
            return redirect('/')->withErrors(['msg' => 'Unable to login with Apple.']);
        }
    }

    // Create or login the user
    protected function createOrLoginUser($socialUser, $provider)
    {
        // Check if the user exists by email
        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            // If the user exists but the provider_id doesn't match, update the user
            if ($user->provider_id !== $socialUser->getId()) {
                $user->update([
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                ]);
            }
        } else {
            // Create a new user
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'password' => bcrypt(str_random(16)), // Generate a random password for new users
            ]);
        }

        // Log in the user
        Auth::login($user, true);
    }
}
