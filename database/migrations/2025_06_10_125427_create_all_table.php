<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->date('date_inscription')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients');
            $table->string('marque');
            $table->string('modele');
            $table->year('annee');
            $table->string('immatriculation');
            $table->integer('kilometrage');
            $table->string('type_carburant');
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('code_service')->unique();
            $table->string('nom_service');
            $table->text('description')->nullable();
            $table->integer('duree_moyenne')->nullable(); // en minutes
            $table->decimal('prix_standard', 8, 2);
            $table->timestamps();
        });

        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained('vehicules');
            $table->date('date_intervention');
            $table->integer('kilometrage');
            $table->string('technicien');
            $table->string('statut');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('details_interventions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intervention_id')->constrained('interventions');
            $table->foreignId('service_id')->constrained('services');
            $table->integer('quantite')->default(1);
            $table->decimal('prix_unitaire', 8, 2);
            $table->decimal('remise', 8, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('nom_produit');
            $table->string('categorie');
            $table->integer('quantite_stock');
            $table->integer('seuil_alerte');
            $table->decimal('prix_achat', 8, 2);
            $table->decimal('prix_vente', 8, 2);
            $table->string('fournisseur')->nullable();
            $table->timestamps();
        });

        Schema::create('utilisation_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intervention_id')->constrained('interventions');
            $table->foreignId('produit_id')->constrained('stocks');
            $table->integer('quantite_utilisee');
            $table->timestamps();
        });

        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('intervention_id')->constrained('interventions');
            $table->date('date_facture');
            $table->date('date_echeance')->nullable();
            $table->decimal('montant_ht', 8, 2);
            $table->decimal('tva', 8, 2);
            $table->decimal('montant_ttc', 8, 2);
            $table->string('statut_paiement');
            $table->string('mode_paiement')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factures');
        Schema::dropIfExists('utilisation_produits');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('details_interventions');
        Schema::dropIfExists('interventions');
        Schema::dropIfExists('services');
        Schema::dropIfExists('vehicules');
        Schema::dropIfExists('clients');
    }
};
