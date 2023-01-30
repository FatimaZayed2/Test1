<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $cust = customer::all();
       // return view('Customers.AllCustomers')->with('cust', $cust);
      $C= DB::table('customers')->get();
     // dd($C);
    return view('Customers.AllCustomers',compact('C'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customers.Addcustomers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* check the name of customers if is exist or not******************/

$validatedData = $request->validate([
    'email' => 'required|unique:customers|max:255',
    'user_name' => 'required|unique:customers|max:100',
    'first_name' => 'required:customers|max:100',
    'Last_name' => 'required:customers|max:100',
],[

    'email.required' =>'Please Enter the Email Address',
    'email.unique' =>'this email is exist ',

    'user_name.required' =>'Please Enter your Name',
    'email.unique' =>'this name is exist ',


]);


customer::create([

            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'Last_name' => $request->Last_name,
            'email' => $request->email,
            'Salary' => $request->Salary,
            'status' => $request->status,

        ]);
            session()->flash('Add', 'The customer has been Added');
            return redirect('/Customers.Addcustomers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer, $id)
    {
        $cust = DB::table('customers')->where('id', $id)->first();
        return view('Customers.EditCustomers', compact('cust'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cust = DB::table('customers')->where('id', $id)->first();
       // $cust = customer::all();
       return view('Customers.EditCustomers', compact('cust'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('customers')->where('id', $request->id)->update([

            'user_name' => $request->user_name,
            'first_name' => $request->first_name,
            'Last_name' => $request->Last_name,
            'email' => $request->email,
            'Salary' => $request->Salary,
            'status' => $request->status,

        ]);

            session()->flash('Edit', 'The customer has been Update');
            return redirect('/Customers.EditCustomers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer, $cust)
    {
        DB::table('customers')->where('id', $cust)->delete();
        return redirect('/Customers.AllCustomers')->with('delete', 'Request Has Been Deleted Successfully!');

    }

    /************************************************* Multiple delete by using checkbox****************************************** */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("customers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "customers Deleted successfully."]);
    }
}

