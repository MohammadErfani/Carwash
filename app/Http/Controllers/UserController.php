<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('personalInfo', ['user' => $user]);
    }

    public function update(Request $request)
    {
        User::where('id',Auth::user()->id)->update(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone]);
        redirect('/dashboard');
    }
}
