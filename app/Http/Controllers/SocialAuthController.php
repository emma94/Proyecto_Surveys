<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Mockery\CountValidator\Exception;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //  public function registerRedirect()
    // {
    //   return Socialite::driver('facebook')->redirect()->to('/views/pages/perfilUsuario.blade.php');
    //}

    public function callback(SocialAccountService $service)
    {
        try {
            $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
            auth()->login($user);
            return redirect()->to('/');
        } catch (Exception $ex) {
            return view("inicio");
        }
    }
}
