<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epayco;

class PagosController extends Controller
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
        //dd($request->epaycoToken);
        

        $epayco = new Epayco\Epayco(array(
            "apiKey" => "",
            "privateKey" => "",
            "lenguage" => "ES",
            "test" => true
        ));


        // $customer = $epayco->customer->create(array(
        //     "token_card" => $request->epaycoToken,
        //     "name" => "Joe Doe",
        //     "email" => "joe@payco.co",
        //     "phone" => "3005234321",
        //     "default" => true
        // ));
        
        // dd($customer);

        $customer = $epayco->customer->get("JwPm5DuN2FAoYCCjQ");

        dd($customer);

        $customer = $epayco->customer->getList();

        dd($customer);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
