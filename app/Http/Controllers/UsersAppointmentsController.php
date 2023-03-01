<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Http\Resources\ResourceAppointments;

class UsersAppointmentsController extends Controller
{
    public function index($user_id) {
        $appointments=Appointments::get()->where('user_id', $user_id);
        if(is_null($appointments)) return response()->json("Nemate zakazanih pregleda",404);
        else         return ['pregledi' => ResourceAppointments::collection(Appointments::get()->where('user_id', $user_id))];
  
           }
}
