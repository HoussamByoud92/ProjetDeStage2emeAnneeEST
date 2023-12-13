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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->integer('CoupFort')->default(0);
            $table->integer('CoupProg')->default(0);
            $table->integer('DureeCF')->default(0);
            $table->integer('DureeCP')->default(0);
            $table->text('PartieHT');
            $table->text('PartiemT');
            $table->integer('nbPannesBT')->default(0);
            $table->integer('nbInciBT')->default(0);
            $table->integer('nbRedMT')->default(0);
            $table->integer('nbInciMT')->default(0);
            $table->integer('nbPosteiCP')->default(0);
            $table->integer('nbtronciCP')->default(0);
            $table->float('Temp1');
            $table->float('CosPhi1');
            $table->float('S1');
            $table->float('Heure1');
            $table->float('TotalEkwh1');
            $table->float('ImaxDep1');
            $table->float('Temp2');
            $table->float('CosPhi2');
            $table->float('S2');
            $table->float('Heure2');
            $table->float('TotalEkwh2');
            $table->float('ImaxDep2');
            $table->float('Temp3')->nullable();
            $table->float('CosPhi3')->nullable();
            $table->float('S3')->nullable();
            $table->float('Heure3')->nullable();
            $table->float('TotalEkwh3')->nullable();
            $table->float('ImaxDep3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
