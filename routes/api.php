<?php

use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('signup', [userController::class, 'authentication']);
Route::post('/login', [userController::class, 'login']);

Route::post('/membership', [MembershipController::class, 'store']);
Route::get('/membership/{id}', [MembershipController::class, 'show']);
Route::get('/allmembership', [MembershipController::class, 'index']);

Route::post('/partner', [PartnerController::class, 'storePartner']);
Route::post('/partner-login', [PartnerController::class, 'login']);
Route::get('/partners', [PartnerController::class, 'getAllPartners']);
Route::get('/partners/{id}', [PartnerController::class, 'getSinglePartner']);

Route::post('/brand', [PartnerController::class, 'storeBrand']);
Route::get('/brands', [PartnerController::class, 'getAllBrands']);
Route::get('/brands/{id}', [PartnerController::class, 'getSingleBrand']);

