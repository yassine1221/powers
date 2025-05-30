<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API routes
Route::get('/services', function () {
    return response()->json([
        'services' => [
            [
                'name' => 'Découpe Laser',
                'description' => 'Création de designs personnalisés avec précision industrielle',
            ],
            [
                'name' => 'Enseignes sur mesure',
                'description' => 'Enseignes lumineuses ou classiques pour intérieur/extérieur',
            ],
            [
                'name' => 'Design Graphique',
                'description' => 'Création de logos et supports de communication visuelle',
            ],
        ]
    ]);
});

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // User profile
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    // Admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/stats', function () {
            return response()->json([
                'users_count' => \App\Models\User::count(),
                'admins_count' => \App\Models\User::where('is_admin', true)->count(),
                'satisfaction_rate' => 98,
            ]);
        });
    });
});
