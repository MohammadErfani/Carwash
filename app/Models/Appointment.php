<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'start_time',
        'end_time'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function user()
    {
        return$this->belongsTo(User::class);
    }
    public function addServices($services){

        foreach ($services as $service){
            $id = ['appointment_id'=>$this->id,'service_id'=>$service];
            DB::table('appointment_service')->insert($id);
        }
    }
}
