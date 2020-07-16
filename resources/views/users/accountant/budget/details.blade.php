@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center">
    <div class="md:w-1/5 md:m-8">
        <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">
            <div class="font-semibold bg-gray-200 text-gray-700 p-4 border-b-2">
                Budget Details
            </div>
            <div class="flex flex-row">
                <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                    Budget Title
                </div>
                <div class="p-4 w-1/2 border-b">
                    {{$budget->title}}
                </div>
            </div>
            <div class="flex flex-row">
                <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                    Budget Description
                </div>
                <div class="p-4 w-1/2 border-b text-justify leading-normal">
                    {{$budget->description}}
                </div>
            </div>
            <div class="flex flex-row">
                <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                    Budget Type
                </div>
                <div class="p-4 w-1/2 border-b uppercase">
                    {{$budget->type}}
                </div>
            </div>
            <div class="flex flex-row">
                <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                    Usage Type
                </div>
                <div class="p-4 w-1/2 border-b uppercase">
                    {{$budget->usage}}
                </div>
            </div>
            <div class="flex flex-row">
                <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                    Status
                </div>
                <div class="p-4 w-1/2 border-b uppercase">
                    {{$budget->status}}
                </div>
            </div>
        </div>
    </div>
    <div class="md:w-1/5 md:m-8">
        <div class="flex bg-gray-200 border-l-4 border-gray-500 text-gray-700 p-4 justify-between">
            <div>
                <p class="font-bold mb-2">Budget Item</p>
                <p>This is all items in this budget</p>
            </div>
            <div>
                <a href="{{route('item.create', $budget->id)}}" class="text-gray-600 whitespace-no-wrap block p-4 bg-gray-300 font-semibold rounded-md text-center mr-2 shadow">
                    Add Item
                 </a>
            </div>
        </div>
        <div class="shadow-md">
            @foreach ($budget->items as $item)
            <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0" id="tab-single-{{$item->id}}" type="radio" name="tabs2">
                <label class="block p-5 leading-normal cursor-pointer" for="tab-single-{{$item->id}}">{{$item->name}} - <b>RM{{number_format($item->total)}}</b> </label>
                <div class="tab-content overflow-hidden border-l-4 bg-gray-100 border-accountant leading-normal">
                    <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">
                        <div class="flex justify-between bg-gray-200 text-gray-700 p-4 border-b-2 items-center">
                            <div class="font-semibold">
                                Item Details
                            </div>
                            <div class="flex">
                                <a href="{{route('item.edit', $item->id)}}" class="text-gray-600 whitespace-no-wrap block p-4 bg-gray-300 font-semibold rounded-md text-center mr-2 shadow">
                                    Edit Item
                                 </a>
                                <a href="{{route('item.destroy', $item->id)}}" data-id="{{$item->id}}" class="removeItemBtn text-gray-600 whitespace-no-wrap block p-4 bg-gray-200 font-semibold rounded-md text-center">Delete Item</a>
                            </div>
                        </div>
                        
                        <div class="flex flex-row">
                            <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                                Item Name
                            </div>
                            <div class="p-4 w-1/2 border-b">
                                {{$item->name}}
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                                Item Type
                            </div>
                            <div class="p-4 w-1/2 border-b capitalize">
                                {{$item->type}} - {{$item->type2}}
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                                Price per Unit
                            </div>
                            <div class="p-4 w-1/2 border-b uppercase">
                                RM{{number_format($item->unit_price)}}
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                                Quantity
                            </div>
                            <div class="p-4 w-1/2 border-b">
                                {{$item->quantity}} ({{$item->uom}})
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="border-r border-b bg-gray-200 text-gray-600 w-1/2 p-4">
                                Total
                            </div>
                            <div class="p-4 w-1/2 border-b uppercase">
                                RM{{number_format($item->total)}}
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            @endforeach
        </div>
        <div class="flex bg-gray-200 border-l-4 border-gray-500 text-gray-700 p-4 justify-between items-center">
            <div>
                <p class="font-bold mb-2">Total</p>
                <p>Grand total of this budget</p>
            </div>
            <div>
                <p class="font-bold mb-2">
                    RM {{number_format($grandTotal)}}
                </p>
            </div>
        </div>
     </div>
</div>
<div class="flex items-center justify-center mt-8">
    <a href="{{route('budget.index')}}" class="p-4 rounded-md bg-accountant text-white">Back to Budget List</a>
</div>

{{-- <div class="flex flex-col w-1/2">
    <div class="border-b bg-gray-200 text-gray-600 w-full p-4">
        Item(s) in this Budget
    </div>
    <div>
        here is the accordion
    </div>
</div> --}}

<script>
    var myRadios = document.getElementsByName('tabs2');
    var setCheck;
    var x = 0;
    for(x = 0; x < myRadios.length; x++){
        myRadios[x].onclick = function(){
            if(setCheck != this){
                setCheck = this;
            }else{
                this.checked = false;
                setCheck = null;
        }
        };
    }

    $('.removeItemBtn').on('click', function (event) {
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