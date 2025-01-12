<?php

namespace App\Http\Controllers\api\Dashboard\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return response()->json(['success' => true, 'data' => $shops], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Not applicable for API'], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'contact' => 'required|numeric',
            'shop_size' => 'required|numeric',
            'region_id' => 'required|integer',
            'city_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'city' => 'required|string|max:255',
            'shop_data' => 'required|string',
            'shop_code' => 'required|integer',
            'area_id' => 'required|integer',
            'shop_category_id' => 'required|integer',
            'qr' => 'required|string',
            'credit_limit' => 'required|numeric',
            'cnic' => 'required|numeric',
            'type' => 'required|string|max:255',
            'ntn' => 'required|numeric',
        ]);

        $shop = Shop::create($validatedData);

        return response()->json(['success' => true, 'message' => 'shop added successfuly', 'data' => $shop], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['success' => false, 'message' => 'Shop not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $shop], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json(['message' => 'Not applicable for API'], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['success' => false, 'message' => 'Shop not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'integer',
            'name' => 'string|max:255',
            'contact_person' => 'string|max:255',
            'owner' => 'string|max:255',
            'contact' => 'numeric',
            'shop_size' => 'numeric',
            'region_id' => 'integer',
            'city_id' => 'integer',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'city' => 'string|max:255',
            'shop_data' => 'string',
            'shop_code' => 'integer',
            'area_id' => 'integer',
            'shop_category_id' => 'integer',
            'qr' => 'string',
            'credit_limit' => 'numeric',
            'cnic' => 'numeric',
            'type' => 'string|max:255',
            'ntn' => 'numeric',
        ]);

        $shop->update($validatedData);

        return response()->json(['success' => true, 'message' => 'shop Updated Successfully', 'data' => $shop], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['success' => false, 'message' => 'Shop not found'], 404);
        }

        $shop->delete();

        return response()->json(['success' => true, 'message' => 'Shop deleted successfully'], 200);
    }
}
