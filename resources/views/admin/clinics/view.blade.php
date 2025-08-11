<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        {{-- Sidebar --}}
        <div class="w-64 bg-white shadow-md">
            @include('admin.components.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-semibold mb-6">Clinic Details</h2>

                <a href="{{ route('admin.clinic.download', $clinic->id) }}" target="_blank" class="inline-block mb-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    Download Clinic & Account Info (PDF)
</a>


                {{-- Success messages --}}
                @if(session('success'))
                    <p class="text-green-600 font-medium mb-4">{{ session('success') }}</p>
                @endif

                @if ($errors->any())
                    <div class="text-red-600 mb-4">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Update Clinic Details --}}
                <form action="{{ route('admin.clinic.updateDetails', $clinic->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium">Clinic Name</label>
                        <input type="text" name="clinic_name" value="{{ old('clinic_name', $clinic->clinic_name) }}" class="border rounded px-3 py-2 w-full" required>
                    </div>

                    <div>
                        <label class="block font-medium">Address</label>
                        <input type="text" name="address" value="{{ old('address', $clinic->address) }}" class="border rounded px-3 py-2 w-full" required>
                    </div>

                    <div>
                        <label class="block font-medium">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ old('contact_number', $clinic->contact_number) }}" class="border rounded px-3 py-2 w-full" required>
                    </div>


                    <div>
                        <label class="block font-medium">Profile Picture</label>
                        <input type="file" name="profile_picture" class="border rounded px-3 py-2 w-full">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update Clinic Details
                    </button>
                </form>

                <hr class="my-8">

                {{-- Update Account Info --}}
                @if ($clinic->user)
                <form action="{{ route('admin.clinic.updateAccount', $clinic->user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <h3 class="text-xl font-bold mb-4">Account Information</h3>

                    <div>
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name" value="{{ old('name', $clinic->user->name) }}" class="border rounded px-3 py-2 w-full" required>
                    </div>

                    <div>
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $clinic->user->email) }}" class="border rounded px-3 py-2 w-full" required>
                    </div>

                    <div>
                        <label class="block font-medium">New Password</label>
                        <input type="password" name="password" class="border rounded px-3 py-2 w-full">
                    </div>

                    <div>
                        <label class="block font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="border rounded px-3 py-2 w-full">
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update Account Info
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
