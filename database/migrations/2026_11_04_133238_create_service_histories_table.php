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
    Schema::create('service_histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained();
        $table->date('service_date');
        $table->string('service_type');
        $table->string('device_appliance');
        $table->text('diagnostics_problem');
        $table->decimal('service_fee', 10, 2)->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_histories');
    }
};
