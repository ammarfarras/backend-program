<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatienstController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Membuat authentication group
Route::middleware(['auth:sanctum'])->group(function(){
    # Get All Resource / Mendapatkan semua resource data patients covid
    Route::get('/patients', [PatienstController::class, 'index']);

    # Add Resource / Menambahkan Resource data patients covid
    Route::post('/patients', [PatienstController::class, 'store']);

    # Get Detail Resource / Mendapatkan single resource yang menampilkan data patients covid
    Route::get('/patients/{id}', [PatienstController::class, 'show']);

    # Edit Resource / Memperbarui single resource untuk mengedit data patients covid
    Route::put('/patients/{id}', [PatienstController::class, 'update']);

    # Delete Resource / Menghapus single resource untuk menghapus data patients covid
    Route::delete('/patients/{id}', [PatienstController::class, 'destroy']);

    # Search Resource by name / Mencari resource by name untuk mencari data patients covid dengan name
    Route::get('/patients/search/{name}', [PatienstController::class, 'search']);

    # Get Positif Resource / Mendapatkan resource data patients yang positif covid
    Route::get('/patients/status/positive', [PatienstController::class, 'positive']);

    # Get Recovered Resource / Mendapatkan resource data patients yang sembuh
    Route::get('/patients/status/recovered', [PatienstController::class, 'recovered']);

    # Get Dead Resource / Mendapatkan resource data patients yang meninggal
    Route::get('/patients/status/dead', [PatienstController::class, 'dead']);
});

# Register / register login untuk authentication
Route::post('/register', [AuthController::class, 'register']);

# Login / token login untuk authentication
Route::post('/login', [AuthController::class, 'login']);