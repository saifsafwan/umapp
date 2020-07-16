<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $budget = Budget::find($id);
        return view('users.accountant.item.new', compact('budget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'item_type' => ['required'],
            'type2' => ['required'],
            'unit_price' => ['required', 'between:0,999999.99'],
            'quantity' => ['required', 'integer'],
            'uom' => ['required', 'max:100'],
        ]);

        $total = $data['unit_price'] * $data['quantity'];
        
        $check = Item::create([
            'budget_id' => $request->budget_id,
            'name' => $data['name'],
            'type' => $data['item_type'],
            'type2' => $data['type2'],
            'unit_price' => $data['unit_price'],
            'quantity' => $data['quantity'],
            'uom' => $data['uom'],
            'total' => $total,
        ]);

        if($check){
            return redirect()->route('budget.show', $request->budget_id)->with('success','New item added!');
        }else {
            return redirect()->route('budget.show', $request->budget_id)->with('error', 'Got error inserting data to item controller');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $budget = Budget::find($item->budget->id);
        return view('users.accountant.item.edit', compact('item', 'budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'item_type' => ['required'],
            'type2' => ['required'],
            'unit_price' => ['required', 'between:0,999999.99'],
            'quantity' => ['required', 'integer'],
            'uom' => ['required', 'max:100'],
        ]);

        $item = Item::find($id);

        $item->name = $data['name'];        
        $item->type = $data['item_type'];       
        $item->type2 = $data['type2'];  
        $item->unit_price = $data['unit_price'];     
        $item->quantity = $data['quantity'];    
        $item->uom = $data['uom'];
        
        $total = $data['unit_price'] * $data['quantity'];

        $item->total = $total;

        $item->save();

        return redirect()->route('budget.show', $request->budget_id)->with('success','Item edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        // $budget = $item->budget->id;
        $item->delete();

        return redirect()->route('budget.index')->with('success','Item Deleted!');
    }
}
