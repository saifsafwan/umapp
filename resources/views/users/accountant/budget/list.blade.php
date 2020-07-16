@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-full mx-4 md:w-3/5 md:mx-auto">
            <!-- component -->
            <div class="container mx-auto px-4 sm:px-8">
                <div class="py-8">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold leading-tight">All Budgets</h2>
                        <a href="{{route('budget.create')}}" class="p-4 bg-accountant rounded-md text-white shadow">Add New Budget</a>
                    </div>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Budget Title
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Budget Type
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Usage Type
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Items
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase text-center tracking-wider border-l-2 ">
                                            Option
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($budgets as $budget)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center justify-start">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$budget->title}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap uppercase text-center">{{$budget->type}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap uppercase text-center">
                                                {{$budget->usage}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                {{count($budget->items)}} items
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            @if ($budget->status == null)
                                            <span class="relative inline-block px-3 py-1 font-semibold text-gray-600 leading-tight">
                                                <span aria-hidden class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                                <span class="relative">NEW</span>
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-l border-gray-200 bg-white text-sm">
                                            <div class="flex">
                                                 <a href="{{route('budget.show', $budget->id)}}" class="text-gray-600 whitespace-no-wrap block p-4 bg-gray-200 font-semibold rounded-md text-center mr-2">
                                                    View Details
                                                 </a>
                                                 <a href="{{route('budget.edit', $budget->id)}}" class="text-gray-600 whitespace-no-wrap block p-4 bg-gray-200 font-semibold rounded-md text-center mr-2">
                                                    Edit Budget
                                                 </a>
                                                 {{-- <button id="deleteBudget" onclick="deleteConfirmation({{$budget->id}})" class="text-gray-600 whitespace-no-wrap block p-4 bg-gray-200 font-semibold rounded-md text-center mr-2" data-id="{{ $budget->id }}" data-action="{{ route('budget.destroy',$budget->id) }}">
                                                    Delete Budget
                                                </button> --}}
                                                <a href="{{route('budget.destroy', $budget->id)}}" data-id="{{$budget->id}}" class="removeBtn text-gray-600 whitespace-no-wrap block p-4 bg-gray-200 font-semibold rounded-md text-center mr-2">Delete Budget</a>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.removeBtn').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                console.log(results);
                                location.reload();
                            } else {
                                console.log(results);
                                location.reload();
                            }
                        },
                        error: function(results){
                            console.log(results);
                            location.reload();
                        }
                        
                    });
                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        });
    </script>
@endsection

