<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        if(Service::where('name','روشویی')->first() ==null) {
            Service::insert([
                ['name' => "روشویی", 'price' => 25000, 'duration' => 15],
                ['name' => "نظافت داخلی", 'price' => 30000, 'duration' => 20],
                ['name' => "صفرشویی", 'price' => 80000, 'duration' => 60]
            ]);
            return "services added";
        }
        return "services already added";
    }
}
