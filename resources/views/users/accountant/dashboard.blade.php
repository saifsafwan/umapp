@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Accountant Dashboard
                </div>

                <div class="flex flex-col p-8 m-8">
                    <div>
                        <a href="{{route('budget.index')}}" class="bg-accountant text-white font-semibold p-8 rounded-md">Budget Management</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection