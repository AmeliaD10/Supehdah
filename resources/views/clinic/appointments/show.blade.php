@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Appointment Details</h1>

    <p><strong>Patient Name:</strong> {{ $appointment->patient_name }}</p>
    <p><strong>Clinic ID:</strong> {{ $appointment->clinic_id }}</p>

    <hr class="my-4">

    <h2 class="text-xl font-semibold mb-2">Custom Fields</h2>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Field</th>
                <th class="border px-4 py-2">Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointment->customValues as $value)
                <tr>
                    <td class="border px-4 py-2">{{ $value->field->label }}</td>
                    <td class="border px-4 py-2">{{ $value->value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
