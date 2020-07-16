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
                    Edit Budget - {{$budget->title}}
                </div>
                <form action="{{route('budget.update', $budget->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="w-3/4 p-6 mx-auto">
                        <label class="block">
                            <span class="text-gray-600 block mb-2 font-semibold">Application Title</span>
                            <input type="text" name="title" class="form-input mt-1 block w-full" value="{{$budget->title}}">
                        </label>
                        <label class="block mt-4">
                            <span class="text-gray-600 font-semibold">Budget Description</span>
                            <textarea name="description" class="form-textarea mt-2 block w-full" rows="5">{{$budget->description}}</textarea>
                        </label>
                        <div class="mt-4">
                            <span class="text-gray-600 font-semibold">Budget Type</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="type" value="ocar" {{ ($budget->type =="ocar") ? "checked" : "" }}>
                                    <span class="ml-2">OCAR</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="type" value="bm" {{ ($budget->type =="bm") ? "checked" : "" }}>
                                    <span class="ml-2">BM</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-gray-600 font-semibold">Usage Type</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="usage" value="procurement" {{ ($budget->usage =="procurement") ? "checked" : "" }}>
                                    <span class="ml-2">Procurement</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="usage" value="payment" {{ ($budget->usage =="payment") ? "checked" : "" }}>
                                    <span class="ml-2">Payment</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button class="mt-4 p-4 rounded-md bg-accountant text-white block mr-4" type="submit">Save Changes</button>
                            <a class="mt-4 p-4 rounded-md bg-gray-400 text-gray-800 block" href="{{url()->previous()}}">Back</a>
                        </div>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
@endsection