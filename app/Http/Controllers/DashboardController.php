<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Intervention;
use App\Models\Facture;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'clients' => Client::count(),
            'vehicules' => Vehicule::count(),
            'interventions' => Intervention::count(),
            'chiffre_affaires' => Facture::whereMonth('date_facture', Carbon::now()->month)
                                        ->sum('montant_ttc')
        ];

        $recentInterventions = Intervention::with(['vehicule.client'])
            ->orderBy('date_intervention', 'desc')
            ->take(5)
            ->get();

        $recentFactures = Facture::with('client')
            ->orderBy('date_facture', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentInterventions' => $recentInterventions,
            'recentFactures' => $recentFactures
        ]);
    }
}