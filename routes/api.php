<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Dashboard\EmployeeController;
use App\Http\Controllers\api\Dashboard\Employee\EmpCategoryController;
use App\Http\Controllers\api\Dashboard\Region\RegionController;
use App\Http\Controllers\api\Dashboard\Area\AreaController;
use App\Http\Controllers\api\Dashboard\Area\AreaGroupController;
use App\Http\Controllers\api\Dashboard\Shop\ShopCategoryController;
use App\Http\Controllers\api\Dashboard\Shop\ShopController;
use App\Http\Controllers\api\Dashboard\Vehicle\VehicleController;
use App\Http\Controllers\api\Dashboard\Sku\SkuController;
use App\Http\Controllers\api\Dashboard\Sku\SkuCategoryController;
use App\Http\Controllers\api\Dashboard\Sku\PromotionController;
use App\Models\Sku\Promotion;
use App\Models\Sku\SkuCategory;

// Route to get the authenticated user
Route::get('/user', function (Request $request) {
    return $request->user();
});

/*--------------Employees-------------------*/
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('employecategory', EmpCategoryController::class);


/*--------------Regions-------------------*/
Route::apiResource('regions', RegionController::class);


/*--------------Areas-------------------*/
Route::apiResource('areas', AreaController::class);


/*--------------AreaGroup-------------------*/
Route::apiResource('areagroups', AreaGroupController::class);

/*--------------ShopCategory-------------------*/
Route::apiResource('shopcategory', ShopCategoryController::class);
/*--------------Shop-------------------*/
Route::apiResource('shop', ShopController::class);


/*--------------Vehicle-------------------*/
Route::apiResource('vehicle', VehicleController::class);

/*--------------Sku-------------------*/
Route::apiResource('skucategory', SkuCategoryController::class);
Route::apiResource('sku', SkuController::class);
Route::apiResource('promotion', PromotionController::class);