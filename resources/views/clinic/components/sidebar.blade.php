@php
    use App\Models\ClinicInfo;
    $clinic = ClinicInfo::where('user_id', auth()->id())->first();
@endphp

<!-- Refined Modern Sidebar -->
<div class="w-64 h-screen bg-gradient-to-b from-[#1F2937] to-[#0F172A] text-gray-100 fixed top-0 left-0 shadow-xl flex flex-col">

    <!-- Logo and Clinic Name -->
    <div class="flex flex-col items-center justify-center px-4 py-6 border-b border-gray-700">
        <img src="{{ asset('storage/' . $clinic->profile_picture) }}" alt="Clinic Logo"
            class="rounded-full shadow-md object-cover mb-3" style="width: 72px; height: 72px;">
        <h1 class="text-lg font-semibold text-center leading-tight tracking-wide">
            {{ $clinic ? $clinic->clinic_name : 'Clinic Dashboard' }}
        </h1>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 px-4 flex-1 overflow-y-auto">
        <ul class="space-y-2 font-medium text-sm">
            <li>
                <a href="{{ route('clinic.dashboard') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('clinic.appointments.index') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Appointment Form
                </a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Appointments
                </a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Doctors
                </a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Patients
                </a>
            </li>
            <li>
                <a href="{{ route('clinic.gallery.index') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Gallery
                </a>
            </li>
            <li>
                <a href="#"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    Settings
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout -->
    <div class="px-4 py-4 border-t border-gray-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-3 text-red-400 hover:text-white hover:bg-red-600 rounded-md transition duration-200">
                Logout
            </button>
        </form>
    </div>
</div>
