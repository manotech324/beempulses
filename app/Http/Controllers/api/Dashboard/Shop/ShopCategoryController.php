<?php

namespace App\Http\Controllers\api\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopCategories = ShopCategory::all();
        return response()->json([
            'message' => 'Shop categories fetched successfully',
            'data' => $shopCategories
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'message' => 'This method is not applicable in an API context.'
        ], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shop_cat_name' => 'required|string|max:255',
            'exception' => 'required|integer',
            'pending_receipts' => 'required|integer',
            'ratio_for_credit' => 'required|integer',
            'top_level_to' => 'required|integer',
        ]);

        $shopCategory = ShopCategory::create($validatedData);

        return response()->json([
            'message' => 'Shop category created successfully',
            'data' => $shopCategory
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shopCategory = ShopCategory::find($id);

        if (!$shopCategory) {
            return response()->json(['message' => 'Shop category not found'], 404);
        }

        return response()->json([
            'message' => 'Shop category fetched successfully',
            'data' => $shopCategory
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json([
            'message' => 'This method is not applicable in an API context.'
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shopCategory = ShopCategory::find($id);

        if (!$shopCategory) {
            return response()->json(['message' => 'Shop category not found'], 404);
        }

        $validatedData = $request->validate([
            'shop_cat_name' => 'sometimes|string|max:255',
            'exception' => 'sometimes|integer',
            'pending_receipts' => 'sometimes|integer',
            'ratio_for_credit' => 'sometimes|integer',
            'top_level_to' => 'sometimes|integer',
        ]);

        $shopCategory->update($validatedData);

        return response()->json([
            'message' => 'Shop category updated successfully',
            'data' => $shopCategory
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shopCategory = ShopCategory::find($id);

        if (!$shopCategory) {
            return response()->json(['message' => 'Shop category not found'], 404);
        }

        $shopCategory->delete();

        return response()->json(['message' => 'Shop category deleted successfully'], 200);
    }
}
