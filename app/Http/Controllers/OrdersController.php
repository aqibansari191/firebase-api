<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    //
    public function insertOrder(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'agent_id' => 'required|string',
            'amount' => 'required|string',
            'brand_id' => 'required|string',
            'email' => 'required|email',
            'order_id' => 'required|string|unique:orders,order_id',
            'membership_id' => 'required|string',
            'name' => 'required|string',
            'order_by' => 'required|string',
            'order_no' => 'required|string',
            'receipt' => 'required|string',
            'status' => 'required|string',
            'user_id' => 'required|string',
        ]);
        $order = OrdersModel::create($validate->validated());
        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Order inserted successfully!',
            'data' => $order
        ], 201);
    }


    public function GetAllOrders()
    {
        $orders = OrdersModel::all();

        if ($orders->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No orders found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $orders
        ], 200);
    }


    public function getSingleOrder($id){
        $orders=OrdersModel::find($id);
        if(!$orders){
            return response()->json([
                "success"=> false,
                "message"=>"Order not found "
            ],400);
        }

        return response()->json([
            'success'=>true,
            'data'=>$orders
        ],200);

    }
}
