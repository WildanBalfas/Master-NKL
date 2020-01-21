<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Auth;


class usersController extends Controller
{
    public function createUser(Request $request){
        $user = new User;
        $user -> role = $request->role;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = bcrypt($request->password);
        $user -> showPassword = $request->password;
        // $user -> remember_token = str_random(60);
        $user->save();
        return redirect('/view-user');
    }

    public function form(){
        return view('contents.register');
    }

    public function showUser(){
        // $pass = User::select('password')->get();
        
        // $decrypted = Crypt::decryptString($pass);

        $users = User::all();

        return view('contents.viewUser', compact('users'));
    }

    function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/view-user');
    }

    function editUser($id)
    {
        $user = User::where('id','=',$id)->first();

        return view('contents.editUser')
        ->with('user_data',$user);
    }

    function updateUser(Request $request, $id)
    {

        $user = User::find($id);
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> password = bcrypt($request->password);
            $user -> showPassword = $request->password;
        $user->save();

        return redirect('/view-user');
    }

    // public function store(Request $request)
    // {
    //
    //     // save into table
    //     $user = User::create([
    //         'role' => $request->role,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password)
    //     ]);

    //     // autologin
    //     Auth::loginUsingId($user->id);
    //     // redirect to home
    //     return redirect('/home');
    // }
}
