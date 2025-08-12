@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Appointments</h1>
    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $appointment->name }}</td>
                <td class="py-2 px-4">{{ $appointment->date }}</td>
                <td class="py-2 px-4">{{ ucfirst($appointment->status) }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('clinic.appointments.show', $appointment->id) }}" 
                       class="text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
