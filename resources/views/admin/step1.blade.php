{{-- resources/views/admin/clinic/step1.blade.php --}}

<x-app-layout>
    <div class="relative">
        @include('admin.components.sidebar')

        <div class="ml-64">
            <div class="py-6 px-4">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Step 1: Clinic Information</h2>

                <form action="{{ route('step1.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Clinic Name</label>
                        <input type="text" name="name" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Address</label>
                        <input type="text" name="address" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Contact Number</label>
                        <input type="text" name="contact_number" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Logo (optional)</label>
                        <input type="file" name="logo" class="form-input w-full">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Continue to Step 2</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</x-app-layout>
