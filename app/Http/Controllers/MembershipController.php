<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\membershipModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'nullable|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'brand_logo_url' => 'nullable|string|max:255',
            'coupon_title_tab1' => 'nullable|string|max:255',
            'coupon_title_tab2' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:1000',
            'duration' => 'nullable|string|max:255',
            'fcm_token' => 'nullable|string|max:255',
            'hero_image_url' => 'nullable|string|max:255',
            'custom_id' => 'nullable|string|max:255',
            'is_food_without_stay' => 'nullable|boolean', // Allow nullable and handle default in the controller
            'more_info' => 'nullable|string|max:1000',
            'no_of_coupons' => 'nullable|integer|min:1',
            'offers' => 'nullable|string|max:1000',
            'price' => 'nullable|integer|min:0',
            'title' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:100',
            'unit' => 'nullable|string|max:50',
            'start_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        $isFoodWithoutStay = $request->has('is_food_without_stay') ? $request->is_food_without_stay : false;

        $membership = membershipModel::create([
            'brand_id' => $request->brand_id,
            'brand_name' => $request->brand_name,
            'brand_logo_url' => $request->brand_logo_url,
            'coupon_title_tab1' => $request->coupon_title_tab1,
            'coupon_title_tab2' => $request->coupon_title_tab2,
            'desc' => $request->desc,
            'duration' => $request->duration,
            'fcm_token' => $request->fcm_token,
            'hero_image_url' => $request->hero_image_url,
            'custom_id' => $request->custom_id,
            'is_food_without_stay' => $isFoodWithoutStay, // Use the determined value (either true/false)
            'more_info' => $request->more_info,
            'no_of_coupons' => $request->no_of_coupons,
            'offers' => $request->offers,
            'price' => $request->price,
            'title' => $request->title,
            'type' => $request->type,
            'unit' => $request->unit,
            'start_date' => $request->start_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Membership created successfully.',
            'data' => $membership,
        ], 200);
    }

    public function show($id)
    {
        $membership = membershipModel::find($id);
        if (!$membership) {
            return response()->json([
                'success' => false,
                'message' => 'Membership not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Membership details retrieved successfully.',
            'data' => $membership,
        ], 200);
    }
    public function index()
    {

        $memberships = membershipModel::all();
        if ($memberships->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No membership records found.',
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'All membership details retrieved successfully.',
            'data' => $memberships,
        ], 200);
    }
}
