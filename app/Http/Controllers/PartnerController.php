<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{

    public function storePartner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'partner_id'   => 'required|string|unique:partners,id',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'nullable|string|max:255',
            'password' => 'required|string|min:6',
            'email'        => 'nullable|email|unique:partners,email',
            'gender'       => 'nullable|string|in:Male,Female,Other',
            'number'       => 'nullable|string|max:15',
            'new_user'     => 'nullable|boolean',
            'status'       => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $partner = new Partner();
        // $partner->id = $request->partner_id;
        $partner->first_name = $request->first_name;
        $partner->last_name = $request->last_name;
        $partner->email = $request->email;
        $partner->password = Hash::make($request->password);
        $partner->gender = $request->gender;
        $partner->number = $request->number;
        $partner->new_user = $request->new_user ?? false;
        $partner->status = $request->status ?? false;
        $partner->save();

        return response()->json([
            'status' => true,
            'message' => 'Partner inserted successfully!',
            'partner_id' => $partner->id
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $partner = Partner::where('email', $request->email)->first();

        if (!$partner || !Hash::check($request->password, $partner->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login successful!',
            'partner' => $partner,
        ]);
    }


    public function storeBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name'   => 'required|string|max:255',
            'logo_url'     => 'nullable|string',
            'image'        => 'nullable|string',
            'address_line1' => 'nullable|string',
            'address_line2' => 'nullable|string',
            'city'         => 'nullable|string',
            'country'      => 'nullable|string',
            'state'        => 'nullable|string',
            'pincode'      => 'nullable|string',
            'contact'      => 'nullable|string|max:20',
            'brand_email'  => 'nullable|email',
            'no_voters'    => 'nullable|numeric',
            'ratings'      => 'nullable|integer|min:1|max:5',
            'price'        => 'nullable|string',
            'desc'         => 'nullable|string',
            'partner_id'   => 'required|exists:partners,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $brand = new Brand();
        $brand->name = $request->brand_name;
        $brand->logo_url = $request->logo_url;
        $brand->image = $request->image;
        $brand->address_line1 = $request->address_line1;
        $brand->address_line2 = $request->address_line2;
        $brand->city = $request->city;
        $brand->country = $request->country;
        $brand->state = $request->state;
        $brand->pincode = $request->pincode;
        $brand->contact = $request->contact;
        $brand->email = $request->brand_email;
        $brand->no_voters = $request->no_voters;
        $brand->ratings = $request->ratings;
        $brand->price = $request->price;
        $brand->partner_id = $request->partner_id;
        $brand->desc = $request->desc;
        $brand->save();

        return response()->json([
            'status' => true,
            'message' => 'Brand inserted successfully!',
            'brand' => $brand
        ]);
    }
}
