<?php

namespace App\Http\Controllers\api\Dashboard\Sku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sku\Sku;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skus = Sku::all();
        return response()->json([
            'message' => 'All SKUs retrieved successfully',
            'data' => $skus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'message' => 'SKU create endpoint is available.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku_category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'sku_price_status' => 'required|string',
            'price' => 'required|numeric',
            'liters_per_pack' => 'required|numeric',
        ]);

        $sku = Sku::create($validatedData);

        return response()->json([
            'message' => 'SKU added successfully',
            'data' => $sku
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sku = Sku::find($id);

        if (!$sku) {
            return response()->json([
                'message' => 'SKU not found'
            ], 404);
        }

        return response()->json([
            'message' => 'SKU retrieved successfully',
            'data' => $sku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sku = Sku::find($id);

        if (!$sku) {
            return response()->json([
                'message' => 'SKU not found'
            ], 404);
        }

        return response()->json([
            'message' => 'SKU edit endpoint is available.',
            'data' => $sku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sku = Sku::find($id);

        if (!$sku) {
            return response()->json([
                'message' => 'SKU not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'sku_category_id' => 'integer',
            'name' => 'string|max:255',
            'sku_price_status' => 'string',
            'price' => 'numeric',
            'liters_per_pack' => 'numeric',
        ]);

        $sku->update($validatedData);

        return response()->json([
            'message' => 'SKU updated successfully',
            'data' => $sku
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sku = Sku::find($id);

        if (!$sku) {
            return response()->json([
                'message' => 'SKU not found'
            ], 404);
        }

        $sku->destroy();

        return response()->json([
            'message' => 'SKU deleted successfully'
        ]);
    }
}
