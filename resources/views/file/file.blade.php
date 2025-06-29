@extends('layouts.app')


@section('title', 'Kit Service | add_new_employee')


<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


@section('content')



    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-5">

        <!-- Card -->
        <a href="{{ route('employees.download.template') }}" class="block">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:bg-gray-100 transition">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                        ></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Employee
                    </p>
                    <svg class="w-5 h-5 text-gray-400 hover:text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 4v16c0 1.104.896 2 2 2h12a2 2 0 002-2V4M4 4h16M4 4l8 8 8-8"/>
                    </svg>
                </div>
            </div>
        </a>
    </div>



@endsection
