@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/4 md:mx-auto">

            {{-- @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif --}}

            <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    New Budget Application
                </div>
                <form action="{{route('budget.store')}}" method="POST">
                    @csrf
                    <div class="w-3/4 p-6 mx-auto">
                        <label class="block">
                            <span class="text-gray-600 block mb-2 font-semibold">Application Title</span>
                            <input type="text" name="title" class="form-input mt-1 block w-full" placeholder="Budget for ...">
                        </label>
                        <label class="block mt-4">
                            <span class="text-gray-600 font-semibold">Budget Description</span>
                            <textarea name="description" class="form-textarea mt-2 block w-full" rows="5" placeholder="Justify the needs of the budget ..."></textarea>
                        </label>
                        <div class="mt-4">
                            <span class="text-gray-600 font-semibold">Budget Type</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="type" value="ocar">
                                    <span class="ml-2">OCAR</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="type" value="bm">
                                    <span class="ml-2">BM</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-gray-600 font-semibold">Usage Type</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="usage" value="procurement">
                                    <span class="ml-2">Procurement</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="usage" value="payment">
                                    <span class="ml-2">Payment</span>
                                </label>
                            </div>
                        </div>
                        <button class="mt-4 p-4 rounded-md bg-accountant text-white" type="submit">Add New Budget</button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
@endsection