<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserSaveRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', ['users' => User::all()]);
    }

    public function delete(User $id)
    {
        $id->delete();
        return redirect()->route('admin::user::catalog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        return view('admin.user.update', ['user' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        if (isset($user)) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $is_admin = $request->input('is_admin') != null;

            $user->fill([
                'name' => htmlspecialchars($name),
                'email' => htmlspecialchars($email),
                'is_admin' => $is_admin,
            ]);

            if (!empty($password)) {
                $user->password = \Hash::make($password);
            }

            $user->save();

            return redirect()->route('admin::user::catalog');
        } else {
            echo 'Can\'t find any users...';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(AdminUserSaveRequest $request, User $user)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $is_admin = $request->input('is_admin') != null;

        $user->fill([
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'password' => \Hash::make($password),
            'is_admin' => $is_admin,
        ]);

        $user->save();

        return redirect()->route('admin::user::catalog');
    }

    public function new()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
