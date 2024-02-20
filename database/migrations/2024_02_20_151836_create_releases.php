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
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('developer');
            $table->date('development')->nullable();
            $table->date('staging')->nullable();
            $table->date('production')->nullable();
            $table->string('site');
            $table->date('peer')->nullable();
            $table->string('project_owner');
            $table->string('branch_link');
            $table->text('notes');
            $table->string('status')->default('Pending Approval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releases');
    }
};
