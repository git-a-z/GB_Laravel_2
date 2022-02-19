<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function loginVK() {
        // echo 'loginVK'; exit;

        if(\Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK() {
        // echo 'responseVK'; exit;

        // $user = Socialite::driver('vkontakte')->user();
        // dd($user);

        $user = Socialite::driver('vkontakte')->user();
        $ownUser = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', 'vk')
            ->first();

        if(is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => \Hash::make('qwerty'),
                'id_in_soc' => $user->id,
                'type_auth' => 'vk',
                'avatar' => $user->getAvatar(),
            ])->save();
        }

        \Auth::login($ownUser);
        return redirect()->route("news::catalog");
    }
}
