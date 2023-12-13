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
        Schema::create('InciArch', function (Blueprint $table) {
            $table->id();
            $table->date('DateArchivage');
            /*$table->unsignedInteger()('referenceO');
            $table->foreign('referenceO')
                ->references('id')->on('rapports')->onDelete('cascade');*/
            $table->string('InciArch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('InciArch');
    }
};
