<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager');
    }

    public function allUsers()
    {
        $users = User::all();
        foreach ($users as $user) {
            $contribute = $user->appointments->wherebetween('created_at', [Carbon::now()->subMonth(3), Carbon::now()])->count();

            if ($contribute > 5) {
                $user->color = 'green';
            } elseif ($contribute > 1) {
                $user->color = 'orange';
            } else {
                $user->color = 'red';
            }
            $appointments = $user->appointments;
            $user->price = 0;
            if ($appointments->count() > 0) {
                foreach ($appointments as $appointment) {
                    $services = $appointment->services;
                    foreach ($services as $service) {
                        $user->price += $service->price;
                    }
                }

            }
        }
        return view('allUsers', ['users' => $users]);
    }

    public function showUser(Request $request)
    {
        $user = User::find($request->id)->first();
        return view('showUser',['user'=>$user,'appointments'=> $user->appointments]);
    }

    public function allservices()
    {
        $services = Service::all();
        return view('allServices',['services'=>$services]);
    }
    public function showService(Request $request)
    {

        $service = Service::find($request->id);
        return view('showService',['service'=>$service,'appointments'=> $service->appointments]);
    }
    public function createService(){
        return view('createService');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'duration'=>'required',
            'price'=>'required',
        ]);
        Service::create($request->input());
        return redirect('/manager');
    }
}
