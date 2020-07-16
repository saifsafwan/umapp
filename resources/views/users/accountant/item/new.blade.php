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
                    Add Item to Budget : {{$budget->title}}
                </div>
                <form action="{{route('item.store')}}" method="POST">
                    @csrf
                    <div class="w-3/4 p-6 mx-auto">
                        <label class="block">
                            <span class="text-gray-700 block mb-2 font-semibold">Item Name</span>
                            <input type="text" name="name" class="form-input mt-1 block w-full" placeholder="Budget for ...">
                        </label>
                        <label for="item_type" class="block text-gray-700 font-semibold mb-2 my-4">
                            Item Type
                        </label>
                        <div class="flex">
                            <select name="item_type" id="item_type" class="form-select block w-1/2" required>
                                <option value="" selected="selected">Please select ...</option>
                                <option value="asset">Asset</option>
                                <option value="service">Service</option>
                            </select>
                            <select id="type2" name="type2" class="form-select block w-1/2">
                            </select>
                        </div>
                        <label class="block mt-4">
                            <span class="text-gray-700 block mb-2 font-semibold">Price per Unit</span>
                            <div class="flex">
                                <span class="flex items-center rounded rounded-r-none border bg-gray-200 border-r-0 px-3 whitespace-no-wrap">RM</span>
                                <input type="number" step="0.10" name="unit_price" class="form-input block w-full" placeholder="10.00">  
                            </div>
                        </label>
                        <label class="block mt-4">
                            <span class="text-gray-700 block mb-2 font-semibold">Quantity</span>
                            <input type="number" name="quantity" class="form-input mt-1 block w-full" placeholder="15">
                        </label>
                        <label class="block mt-4">
                            <span class="text-gray-700 block mb-2 font-semibold">Unit of measurement</span>
                            <input type="text" name="uom" class="form-input mt-1 block w-full" placeholder="pcs/mm/inches">
                        </label>
                        <input type="hidden" name="budget_id" value="{{$budget->id}}">
                        <button class="mt-4 p-4 rounded-md bg-accountant text-white" type="submit">Add Item to This Budget</button>
                        <a class="mt-4 p-4 rounded-md bg-gray-300 text-gray-600" href="{{ url()->previous() }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // $("#item_type").on("change", function() {
        //     $("#" + $(this).val()).show().siblings().hide();
        // })

        var type2List = {
            asset: ["New Purchase", "Replace Old Assets"],
            service: ["Maintenance", "Training", "Consultation", "Honorarium", "Reimbursement", "Etc"]
        }

        // bind change event handler
        $('#item_type').change(function() {
        // get the second dropdown
            $('#type2').html(
                // get array by the selected value
                type2List[this.value]
                // iterate  and generate options
                .map(function(v) {
                    // generate options with the array element
                    return $('<option/>', {
                    value: v,
                    text: v
                    })
                })
            )
            // trigger change event to generate second select tag initially
        }).change()
    </script>
@endsection