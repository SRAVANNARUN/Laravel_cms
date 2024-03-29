<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }
    public function makeAdmin(User $user){
        $user->role='admin';
        $user->save();
        session()->flash('success', 'User set as admin successfully.');
        return redirect(route('users.index'));
    }
    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UserUpdateRequest $request){
        $user=auth()->user();
        $user->update([
            'name'=>$request->name,
            'about'=>$request->about,
        ]);
        session()->flash('success', 'User profile updated successfully.');
        return redirect(route('users.index'));
    }
}
