<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::query()->where('user_id' , Auth::id())->where('status' , 'in-order')->get();
      return OrderResource::collection($order);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request)
    {
        $order = Order::query()->create([
           'user_id' => Auth::id() ,
           'product_id' => $request->product_id ,
           'status' => 'in-order'
        ]);
return new ProductResource($order->product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $Order)
    {
        if ($Order->user_id == Auth::id()){
            $Order->delete();
            return 'ok';
        }else{
            return 'its not your order';
        }


    }
}
