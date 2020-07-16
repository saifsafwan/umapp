<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budget::orderBy('updated_at', 'desc')->get();

        return view('users.accountant.budget.list', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.accountant.budget.new');
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'type' => ['required', 'string', 'max:255'],
            'usage' => ['required', 'string', 'max:255'],
        ]);
        
        $check = Budget::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'usage' => $data['usage'],
            'user_id' => Auth::id(),
        ]);

        if($check){
            return redirect()->route('budget.index')->with('success','New budget added!');
        }else {
            return redirect()->route('budget.index')->with('error', 'Got error inserting data to budget controller');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::find($id);
        $grandTotal = 0;
        if(count($budget->items) == 0 )
        {
            $grandTotal = 0;
        } else {
            foreach($budget->items as $item)
            {
                $grandTotal += $item->total;
            }
        }
        
        return view('users.accountant.budget.details', compact('budget', 'grandTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = Budget::find($id);
        return view('users.accountant.budget.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'type' => ['required'],
            'usage' => ['required'],
        ]);

        $budget = Budget::find($id);

        $budget->title = $data['title'];
        $budget->description = $data['description'];
        $budget->type = $data['type'];
        $budget->usage = $data['usage'];

        $budget->save();

        return redirect()->route('budget.index')->with('success','Save changes success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::find($id);
        $budget->delete();

        return redirect()->route('budget.index')->with('success','Budget deleted!');


    }
}
