<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequestRequest;
use Illuminate\Http\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Shopify\Clients\Rest;
use Shopify\Exception\UninitializedContextException;
use Symfony\Component\HttpFoundation\Response;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        return response()->json([
            'p_id' => $product_id,
            'status' => $request->is('api/*')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Shopify\Exception\MissingArgumentException
     */
    public function store(ProductRequestRequest $request): \Illuminate\Http\Response
    {
        $client = new Rest(env('SHOP'), env('ACCESS_TOKEN'));
        $res = $client->get(
            "customers"
        );
        echo $res->getStatusCode();
//        return response($request->all());
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
