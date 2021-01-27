<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::getCustomer();
        $group = Group::miniGetGroup();

        return view('pages.pengaturan.kontak.list-kontak', compact('customer', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'meter_no'      => 'required|numeric',
            'customer_id'   => 'required|numeric',
            'name'          => 'required',
            'phone'         => 'required|numeric',
            'address'       => 'required'
        ]);

        Customer::storeCustomer($request);
        return back()->with('success', 'Data kontak pelanggan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        return json_encode(Customer::firstCustomer($customerId));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId)
    {
        $request->validate([
            'meter_no'      => 'required|numeric',
            'customer_id'   => 'required|numeric',
            'name'          => 'required',
            'phone'         => 'required|numeric',
            'address'       => 'required'
        ]);

        Customer::updateCustomer($request, $customerId);
        return back()->with('success', 'Data kontak pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerId)
    {
        Customer::destroyCustomer($customerId);
        return back()->with('success', 'Data kontak pelanggan berhasil dihapus');
    }
}
