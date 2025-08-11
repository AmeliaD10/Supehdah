<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ClinicInfo;

class ClinicAppointmentController extends Controller
{
    // Show the appointment form
    public function index()
    {
        $clinic = ClinicInfo::where('user_id', auth()->id())->first();
        return view('clinic.set_appointment', compact('clinic'));
    }

    // Store appointment data
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
            'pet_type' => 'required|string|max:20',
            'pet_name' => 'required|string|max:50',
            'breed' => 'required|string|max:50',
            'treatment' => 'required|string|max:100',
            'date' => 'required|date',
            'time' => 'required|string'
        ]);

        $appointment = new Appointment();
        $appointment->clinic_id = auth()->user()->id; // assuming clinic user is authenticated
        $appointment->phone_number = $request->phone_number;
        $appointment->pet_type = $request->pet_type;
        $appointment->pet_name = $request->pet_name;
        $appointment->breed = $request->breed;
        $appointment->treatment = $request->treatment;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return back()->with('success', 'Appointment successfully created!');
    }
}
