@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <!-- Start Dashboard Content -->

        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-3 border-light" style="background-color: #1b6f0c;">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $stats['clients'] }} 
                                <span class="float-right"><i class="fa fa-users"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Clients</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $stats['vehicules'] }}
                                <span class="float-right"><i class="fa fa-car"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Véhicules</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-white mb-0">{{ $stats['interventions'] }}
                                <span class="float-right"><i class="fa fa-wrench"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">Interventions</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                            <h5 class="text-danger mb-0">{{ number_format($stats['chiffre_affaires'], 0, ',', ' ') }} GNF
                                <span class="float-right"><i class="fa fa-money text-white"></i></span>
                            </h5>
                            <div class="progress my-3" style="height:3px;">
                                <div class="progress-bar" style="width:55%"></div>
                            </div>
                            <p class="mb-0 text-white small-font">CA du Mois</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interventions Récentes -->
        <div class="row mt-4">
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-header">Interventions Récentes</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: white;color:black;">
                                <tr>
                                    <th>Client</th>
                                    <th>Véhicule</th>
                                    <th>Matricule</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentInterventions as $intervention)
                                    <tr>
                                        <td>{{ $intervention->vehicule->client->nom }}</td>
                                        <td>{{ $intervention->vehicule->marque }}</td>
                                        <td>{{ $intervention->vehicule->matricule }}</td>
                                        <td>{{ \Carbon\Carbon::parse($intervention->date_intervention)->format('d M Y') }}</td>
                                        <td>{{ $intervention->description }}</td>
                                        <td>
                                            <a href="" class="border-light" style="
                                                background: rgba(255, 255, 255, 0.1);
                                                backdrop-filter: blur(12px);
                                                border-radius: 1rem;
                                                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);text-decoration: none;
                                            "><i class="fa fa-user mr-1"></i>Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Factures Récentes -->
            <div class="col-12 col-lg-5">
                <div class="card">
                    <div class="card-header">Factures Récentes</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: white;color:black;">
                                <tr>
                                    <th>Client</th>
                                    <th>Montant TTC</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentFactures as $facture)
                                    <tr>
                                        <td>{{ $facture->client->nom }}</td>
                                        <td>{{ number_format($facture->montant_ttc, 0, ',', ' ') }} GNF</td>
                                        <td>{{ \Carbon\Carbon::parse($facture->date_facture)->format('d M Y') }}</td>
                                        <td>
                                            <a href="" class="border-light" style="
                                                background: rgba(255, 255, 255, 0.1);
                                                backdrop-filter: blur(12px);
                                                border-radius: 1rem;
                                                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);text-decoration: none;
                                            "><i class="fa fa-user mr-1"></i>Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Dashboard Content -->

        <div class="overlay toggle-menu"></div>
    </div>

@endsection
