<!-- Updated Admin Sidebar -->

@php
    use App\Models\User;
@endphp

<div class="w-64 h-screen bg-gradient-to-b from-[#1F2937] to-[#0F172A] text-gray-100 fixed top-0 left-0 shadow-xl flex flex-col">

    <!-- Admin Logo & Name -->
    <div class="flex flex-col items-center justify-center px-4 py-6 border-b border-gray-700">
        <!-- <div class="rounded-full bg-gray-800 w-16 h-16 flex items-center justify-center mb-3 shadow-md">
            <span class="text-xl font-bold text-indigo-300">A</span>
        </div> -->
        <h1 class="text-lg font-semibold text-center leading-tight tracking-wide">
            Admin Panel
        </h1>
    </div>

    <!-- Navigation Links -->
    <nav class="mt-6 px-4 flex-1 overflow-y-auto">
        <ul class="space-y-2 font-medium text-sm">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    📊 Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('step1.create') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    🏥 Register Clinic
                </a>
            </li>
            <li>
                <a href="{{ route('admin.usermag') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    👥 Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.clinics') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    🐾 Clinics
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings') }}"
                    class="block px-4 py-3 rounded-md hover:bg-gray-700 hover:text-white transition duration-200">
                    ⚙️ Settings
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="px-4 py-4 border-t border-gray-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-3 text-red-400 hover:text-white hover:bg-red-600 rounded-md transition duration-200">
                🚪 Logout
            </button>
        </form>
    </div>
</div>
