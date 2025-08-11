{{-- resources/views/admin/step2.blade.php --}}

<x-app-layout>
    <div class="relative">
        {{-- Sidebar --}}
        @include('admin.components.sidebar')

        {{-- Main Content (shifted right to avoid sidebar overlap) --}}
        <div class="ml-64">
            <div class="py-6 px-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                    {{ __('Step 2: Register Clinic Account') }}
                </h2>

                <div class="bg-white shadow rounded-lg p-6">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('step2.store') }}">
                        @csrf

                        <input type="hidden" name="role" value="clinic">

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Staff Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Register Clinic') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
