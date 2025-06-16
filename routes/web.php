<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/password/reset', [AuthController::class, 'showPasswordRequestForm'])->name('password.request');

// Ajouter éventuellement d'autres routes d'authentification ici

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Clients
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{client}', [ClientController::class, 'show'])->name('clients.show');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
        
        // Recherche de clients
        Route::get('/search', [ClientController::class, 'search'])->name('clients.search');
    });

    // Véhicules
    Route::prefix('vehicules')->group(function () {
        Route::get('/', [VehiculeController::class, 'index'])->name('vehicules.index');
        Route::get('/create', [VehiculeController::class, 'create'])->name('vehicules.create');
        Route::post('/', [VehiculeController::class, 'store'])->name('vehicules.store');
        Route::get('/{vehicule}', [VehiculeController::class, 'show'])->name('vehicules.show');
        Route::get('/{vehicule}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
        Route::put('/{vehicule}', [VehiculeController::class, 'update'])->name('vehicules.update');
        Route::delete('/{vehicule}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
        
        // Véhicules par client
        Route::get('/client/{client}', [VehiculeController::class, 'byClient'])->name('vehicules.byClient');
    });

    // Interventions
    Route::prefix('interventions')->group(function () {
        Route::get('/', [InterventionController::class, 'index'])->name('interventions.index');
        Route::get('/create', [InterventionController::class, 'create'])->name('interventions.create');
        Route::post('/', [InterventionController::class, 'store'])->name('interventions.store');
        Route::get('/{intervention}', [InterventionController::class, 'show'])->name('interventions.show');
        Route::get('/{intervention}/edit', [InterventionController::class, 'edit'])->name('interventions.edit');
        Route::put('/{intervention}', [InterventionController::class, 'update'])->name('interventions.update');
        Route::delete('/{intervention}', [InterventionController::class, 'destroy'])->name('interventions.destroy');
        
        // Changement de statut
        Route::post('/{intervention}/status', [InterventionController::class, 'changeStatus'])->name('interventions.changeStatus');
    });

    // Factures
    Route::prefix('factures')->group(function () {
        Route::get('/', [FactureController::class, 'index'])->name('factures.index');
        Route::get('/create/{intervention}', [FactureController::class, 'create'])->name('factures.create');
        Route::post('/', [FactureController::class, 'store'])->name('factures.store');
        Route::get('/{facture}', [FactureController::class, 'show'])->name('factures.show');
        Route::get('/{facture}/edit', [FactureController::class, 'edit'])->name('factures.edit');
        Route::put('/{facture}', [FactureController::class, 'update'])->name('factures.update');
        Route::delete('/{facture}', [FactureController::class, 'destroy'])->name('factures.destroy');
        
        // Génération PDF
        Route::get('/{facture}/download', [FactureController::class, 'download'])->name('factures.download');
        Route::get('/{facture}/print', [FactureController::class, 'print'])->name('factures.print');
        
        // Paiement
        Route::post('/{facture}/pay', [FactureController::class, 'markAsPaid'])->name('factures.markAsPaid');
    });

    // Stock
    Route::prefix('stocks')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('stocks.index');
        Route::get('/create', [StockController::class, 'create'])->name('stocks.create');
        Route::post('/', [StockController::class, 'store'])->name('stocks.store');
        Route::get('/{stock}', [StockController::class, 'show'])->name('stocks.show');
        Route::get('/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
        Route::put('/{stock}', [StockController::class, 'update'])->name('stocks.update');
        Route::delete('/{stock}', [StockController::class, 'destroy'])->name('stocks.destroy');
        
        // Alertes stock
        Route::get('/alertes', [StockController::class, 'alertes'])->name('stocks.alertes');
    });

    // Profil utilisateur
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    });
});

