<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        {{-- Sidebar --}}
        <div class="w-64 bg-white shadow-md">
            @include('admin.components.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-3">⚙️ Admin Settings</h2>

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Settings Form --}}
                <form method="POST" action="{{ route('admin.updateSettings') }}" class="space-y-6">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input name="name" type="text" value="{{ old('name', $admin->name) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                        @error('name') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input name="email" type="email" value="{{ old('email', $admin->email) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                        @error('email') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">New Password</label>
                        <input name="password" type="password"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                        @error('password') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Confirm New Password</label>
                        <input name="password_confirmation" type="password"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t">
                        <button type="reset"
                            class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition mt-4 ml-3 ">
                            Reset
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 rounded-lg bg-blue-600 text-white font-medium shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 transition mt-4">
                            Update Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
