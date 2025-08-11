{{-- resources/views/admin/dashboard.blade.php --}}

<x-app-layout>
    <div class="relative">
        {{-- Sidebar --}}
        @include('admin.components.sidebar')

        {{-- Main Content (shifted right to avoid sidebar overlap) --}}
        <div class="ml-64">
            <div class="py-6 px-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                    {{ __('Admin Dashboard') }}
                </h2>

                <div class="bg-white shadow rounded-lg p-6">
                    Welcome, Admin! 🎉
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
