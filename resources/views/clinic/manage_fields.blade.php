@php
    use App\Models\FieldOption;

    $clinic = \App\Models\ClinicInfo::where('user_id', auth()->id())->first();
    $petOptions = FieldOption::where('clinic_id', $clinic->id)->where('field_type', 'pet')->get();
    $treatmentOptions = FieldOption::where('clinic_id', $clinic->id)->where('field_type', 'treatment')->get();
@endphp

<x-app-layout>
    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex space-x-6">

            {{-- Sidebar --}}
            <div class="w-1/4">
                @include('clinic.components.sidebar')
            </div>

            {{-- Main Content --}}
            <div class="w-3/4 bg-white p-6 rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Manage Field Options</h2>

                {{-- Pet Options --}}
                <div class="mb-10">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Pet Types</h3>
                    <form action="{{ route('clinic.fields.store') }}" method="POST" class="flex space-x-2 mb-4">
                        @csrf
                        <input type="hidden" name="field_type" value="pet">
                        <input type="text" name="value" placeholder="Add new pet type" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add</button>
                    </form>

                    <ul class="space-y-2">
                        @foreach ($petOptions as $option)
                            <li class="flex items-center justify-between bg-gray-50 px-3 py-2 rounded border">
                                <span>{{ $option->value }}</span>
                                <div class="space-x-2">
                                    <form action="{{ route('clinic.fields.destroy', $option->id) }}" method="POST" onsubmit="return confirm('Delete this option?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Treatment Options --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Treatment Options</h3>
                    <form action="{{ route('clinic.fields.store') }}" method="POST" class="flex space-x-2 mb-4">
                        @csrf
                        <input type="hidden" name="field_type" value="treatment">
                        <input type="text" name="value" placeholder="Add new treatment" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-indigo-200">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add</button>
                    </form>

                    <ul class="space-y-2">
                        @foreach ($treatmentOptions as $option)
                            <li class="flex items-center justify-between bg-gray-50 px-3 py-2 rounded border">
                                <span>{{ $option->value }}</span>
                                <div class="space-x-2">
                                    <form action="{{ route('clinic.fields.destroy', $option->id) }}" method="POST" onsubmit="return confirm('Delete this option?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
