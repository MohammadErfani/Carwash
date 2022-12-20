<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use App\Rules\DateBetween;
use App\Rules\FollowingCodePhone;
use App\Rules\ServiceRequired;
use App\Rules\TimeBetween;
use App\Rules\TimeEnd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::all();
        return view('appointment', ['services' => $services]);
    }

    public function store(AppointmentRequest $request)
    {
        $appointment = new Appointment();
//        $user = User::where('phone',$request->input('phone'))->first();
//        if($user==null){
//            $user = new User();
//            $user->name = $request->input('name');
//            $user->phone= $request->input('phone');
//            $user->save();
//        }
        $request->validate([
            'services'=>'required'
        ]);
        $appointment->user_id = Auth::user()->id;
//        dd($request->services);
        if($request->input('checkbox')==null){
            $request->validate(['date'=>['required',new DateBetween()],
                'time'=>['required',new TimeBetween()]]);
            $appointment->start_time = $request->input('time');
            $appointment->date = $request->input('date');
        }else{
            $appointment->start_time =Carbon::CreateFromTimeString('9:00:00')->format('H:i');
            $appointment->date = Carbon::now()->addDay()->format('Y-m-d');
        }
//        $appointment->service_id = $request->input('services');
//        $appointment->user_id = $user->id;
        $minutes = 0;
        foreach($request->services as $service){
            $minutes += Service::find($service)->duration;
        }
        $appointment->end_time=Carbon::parse($appointment->start_time)->addminute($minutes)->format('H:i');
        $request->validate([
            'time'=>new TimeEnd($appointment->end_time)
        ]);
        $appointment->following_code = rand(1000000,9999999);
        $appointment->save();
        $appointment->addServices($request->services);
//        $appointment->attach
        return redirect('/dashboard')->with(['message'=>'appointment created']);
    }

    public function show(Request $request)
    {
        $appointment = Appointment::where('following_code',$request->input('following_code'))->first();
        $request->validate([
            'phone'=>['required',new FollowingCodePhone($appointment)],
            'following_code'=>'required'
        ]);

        return view('show',['appointment'=>$appointment]);
    }

    public function delete(Request $request)
    {
        Appointment::find($request->id)->delete();
        return redirect('/');
    }

    public function all()
    {
        $userId = Auth::user()->id;
        $appointments = Appointment::where('user_id',$userId)->get();
        return view('showAll',['appointments'=>$appointments]);
    }
}
