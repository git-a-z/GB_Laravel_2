<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {
        return view('admin.profile.update', ['user' => \Auth::user()]);
    }

    public function update(AdminProfileUpdateRequest $request)
    {
        $user = \Auth::user();
        $errors = [];
        $password = $request->post('password');

        if (\Hash::check($request->post('current_password'), $user->password)) {
            $user->name = $request->post('name');
            $user->email = $request->post('email');

            if (!empty($password)) {
                $user->password = \Hash::make($password);
            }
            
            $user->save();
        } else {
            $errors['current_password'][] = 'Пароль указан неверно';
            return redirect()->back()
                ->withErrors($errors);
        }

        return redirect()->route('admin::profile::edit');
    }
}
