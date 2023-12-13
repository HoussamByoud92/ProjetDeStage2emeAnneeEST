<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->id();
            $table->integer('Date');
            $table->text('Redigeant');
            $table->string('categorie');
            $table->string('division');
            $table->string('chantier');
            $table->string('LieuEve');
            $table->time('heure');
            $table->string('signalant');
            $table->string('nTele');
            $table->string('NatureDomm')->default('RAS');
            $table->string('SiegeDomme')->default('RAS');
            $table->string('Description')->default('RAS');
            $table->string('IDVictime')->default('RAS');
            $table->date('DateNaiss');
            $table->date('DateEmb');
            $table->string('Matricule')->default('RAS');
            $table->string('Fonction')->default('RAS');
            $table->text('Temoignages');
            $table->text('DescAcci');
            $table->text('Risques');
            $table->text('Chronologie')->default('RAS');
            $table->text('ActionsRec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accidents');
    }
};
