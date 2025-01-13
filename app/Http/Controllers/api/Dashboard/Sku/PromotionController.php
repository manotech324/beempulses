<?php

namespace App\Http\Controllers\api\Dashboard\Sku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sku\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return response()->json([
            'message' => 'All promotions retrieved successfully',
            'data' => $promotions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'message' => 'Promotion create endpoint is available.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'region_id' => 'required|integer',
            'promotion_title' => 'required|string|max:255',
            'promotion_des' => 'required|string',
            'promotion_sku_id' => 'required|integer',
            'promotion_sku_qty' => 'required|integer',
            'foc_sku_id' => 'required|integer',
            'foc_sku_qty' => 'required|integer',
        ]);

        $promotion = Promotion::create($validatedData);

        return response()->json([
            'message' => 'Promotion added successfully',
            'data' => $promotion
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json([
                'message' => 'Promotion not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Promotion retrieved successfully',
            'data' => $promotion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json([
                'message' => 'Promotion not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Promotion edit endpoint is available.',
            'data' => $promotion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json([
                'message' => 'Promotion not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'region_id' => 'integer',
            'promotion_title' => 'string|max:255',
            'promotion_des' => 'string',
            'promotion_sku_id' => 'integer',
            'promotion_sku_qty' => 'integer',
            'foc_sku_id' => 'integer',
            'foc_sku_qty' => 'integer',
        ]);

        $promotion->update($validatedData);

        return response()->json([
            'message' => 'Promotion updated successfully',
            'data' => $promotion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json([
                'message' => 'Promotion not found'
            ], 404);
        }

        $promotion->delete();

        return response()->json([
            'message' => 'Promotion deleted successfully'
        ]);
    }
}