<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentFieldValue;
use App\Models\ClinicField;
use App\Models\ClinicInfo;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request, $clinicId)
    {
        $clinic = ClinicInfo::findOrFail($clinicId);
        $customFields = ClinicField::where('clinic_id', $clinic->id)->get();

        // Create appointment
        $appointment = Appointment::create([
            'clinic_id' => $clinic->id,
            'patient_name' => $request->patient_name,
        ]);

        // Save custom field values
        foreach ($customFields as $field) {
            $value = $request->input('custom_' . $field->id);
            AppointmentFieldValue::create([
                'appointment_id' => $appointment->id,
                'clinic_field_id' => $field->id,
                'value' => $value,
            ]);
        }

        return redirect()->route('appointments.show', $appointment->id)
                         ->with('success', 'Appointment booked successfully!');
    }

    public function show($id)
    {
        $appointment = Appointment::with(['customValues.field'])->findOrFail($id);
        return view('appointments.show', compact('appointment'));
    }

    public function previewForm($clinicId)
{
    $clinic = ClinicInfo::findOrFail($clinicId);
    $customFields = ClinicField::where('clinic_id', $clinicId)
                               ->orderBy('order')
                               ->get();

    return view('clinic.appointments.preview', compact('clinic', 'customFields'));
}
}
