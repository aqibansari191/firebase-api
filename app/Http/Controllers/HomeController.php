<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_id' => 'required|integer',
            'group_name' => 'required|string',
            'desc' => 'required|string',
            'hero_image_url' => 'required|url',
            'item_id' => 'required|string',
            'type' => 'required|integer',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validate->errors(),
            ], 400);
        }

        $group = HomeModel::create([
            'group_id' => $request->group_id,
            'group_name' => $request->group_name,
            'desc' => $request->desc,
            'hero_image_url' => $request->hero_image_url,
            'item_id' => $request->item_id,
            'type' => $request->type,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Group created successfully',
            'group' => $group,
        ], 200);
    }


    public function getAllData()
    {
        $groups = HomeModel::all();
        if ($groups->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No data found.',
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully.',
            'data' => $groups,
        ], 200);
    }

    public function getSingleData($id)
    {
        $group = HomeModel::find($id);
        if (!$group) {
            return response()->json([
                'success' => false,
                'message' => 'No data found with this ID.',
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Single Data retrieved successfully.',
            'data' => $group,
        ], 200);
    }
}
