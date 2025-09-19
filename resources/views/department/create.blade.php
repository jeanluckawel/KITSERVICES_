@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">

        <h2 class="text-2xl font-bold mb-6 text-orange-600">Manage Departments</h2>

        <!-- Tabs -->
        <div x-data="{ tab: 'add' }" class="mb-4">
            <nav class="flex border-b border-orange-200 mb-4">
                <button @click="tab = 'add'"
                        :class="tab === 'add' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Add Department
                </button>
                <button @click="tab = 'show'"
                        :class="tab === 'show' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Show Departments
                </button>
            </nav>

            <!-- Add Department Form -->
            <div x-show="tab === 'add'" x-transition>
                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-300 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 px-4 py-2 bg-red-100 border border-red-300 text-red-700 rounded">
                        {{ $errors->first('name') }}
                    </div>
                @endif


                <form action="{{ route('departments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-2 text-orange-600 font-medium">Name</label>
                        <input type="text" name="name"
                               value="{{ old('name') }}"
                               class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400"
                               required>
                    </div>
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>

            <!-- Show Departments -->
            <div x-show="tab === 'show'" x-transition class="overflow-auto max-h-96 border border-orange-300 rounded">
                <table class="w-full border-collapse">
                    <thead class="bg-orange-100 sticky top-0 z-10">
                    <tr>
                        <th class="border px-4 py-2 text-left text-orange-600">#</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $dept)
                        <tr class="hover:bg-orange-50">
                            <td class="border px-4 py-2">{{ $dept->id }}</td>
                            <td class="border px-4 py-2">{{ $dept->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
