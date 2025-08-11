@php
    use App\Models\ClinicInfo;
    $clinic = ClinicInfo::where('user_id', auth()->id())->first();
@endphp

<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex space-x-6">

            {{-- Sidebar --}}
            <div class="w-1/4">
                @include('clinic.components.sidebar')
            </div>

            {{-- Gallery Content --}}
            <div class="w-3/4">
                <div class="bg-white shadow-xl rounded-lg p-8">

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Clinic Gallery</h2>

                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Upload Form -->
                    <form action="{{ route('clinic.gallery.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
                        @csrf
                        <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4">
                            <input type="file" name="image" required class="border p-2 rounded w-full sm:w-auto">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full sm:w-auto">Upload</button>
                        </div>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </form>

                    <!-- Image Gallery -->
                    @if($images->count())
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($images as $img)
                                <div class="border rounded shadow-sm relative group overflow-hidden">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-32 object-cover rounded-t">
                                    <form action="{{ route('clinic.gallery.delete', $img->id) }}" method="POST" class="absolute top-1 right-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white p-1 rounded text-xs opacity-75 group-hover:opacity-100 transition">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No photos uploaded yet.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
