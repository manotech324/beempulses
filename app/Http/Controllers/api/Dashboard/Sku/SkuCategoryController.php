<?php

namespace App\Http\Controllers\api\Dashboard\Sku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sku\SkuCategory;

class SkuCategoryController extends Controller
{
    /**
     * Display a listing of the SKU categories.
     */
    public function index()
    {
        $skuCategories = SkuCategory::all();
        return response()->json([
            'message' => 'SKU Categories retrieved successfully',
            'data' => $skuCategories,
        ], 200);
    }

    /**
     * Show the form for creating a new SKU category.
     * (For web-based interfaces; currently not used for APIs.)
     */
    public function create()
    {
        return view('dashboard.sku_categories.create');
    }

    /**
     * Store a newly created SKU category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|string|max:255|unique:sku_categories,cat_name',
            'trade_offer' => 'required',
        ]);

        $skuCategory = SkuCategory::create($validatedData);

        return response()->json([
            'message' => 'SKU Category added successfully',
            'data' => $skuCategory,
        ], 201); // 201 Created
    }

    /**
     * Display the specified SKU category.
     */
    public function show(string $id)
    {
        $skuCategory = SkuCategory::find($id);

        if (!$skuCategory) {
            return response()->json([
                'message' => 'SKU Category not found',
            ], 404); // 404 Not Found
        }

        return response()->json([
            'message' => 'SKU Category retrieved successfully',
            'data' => $skuCategory,
        ], 200); // 200 OK
    }

    /**
     * Show the form for editing the specified SKU category.
     * (For web-based interfaces; currently not used for APIs.)
     */
    public function edit(string $id)
    {
        $skuCategory = SkuCategory::find($id);

        if (!$skuCategory) {
            return redirect()->route('sku_categories.index')->with('error', 'SKU Category not found.');
        }

        return view('dashboard.sku_categories.edit', compact('skuCategory'));
    }

    /**
     * Update the specified SKU category in storage.
     */
    public function update(Request $request, string $id)
    {
        $skuCategory = SkuCategory::find($id);

        if (!$skuCategory) {
            return response()->json([
                'message' => 'SKU Category not found',
            ], 404); // 404 Not Found
        }

        $validatedData = $request->validate([
            'cat_name' => 'required|string|max:255|unique:sku_categories,cat_name,' . $skuCategory->id,
            'trade_offer' => 'required',
        ]);

        $skuCategory->update($validatedData);

        return response()->json([
            'message' => 'SKU Category updated successfully',
            'data' => $skuCategory,
        ], 200); // 200 OK
    }

    /**
     * Remove the specified SKU category from storage.
     */
    public function destroy(string $id)
    {
        $skuCategory = SkuCategory::find($id);

        if (!$skuCategory) {
            return response()->json([
                'message' => 'SKU Category not found',
            ], 404); // 404 Not Found
        }

        $skuCategory->delete();

        return response()->json([
            'message' => 'SKU Category deleted successfully',
        ], 200); // 200 OK
    }
}
