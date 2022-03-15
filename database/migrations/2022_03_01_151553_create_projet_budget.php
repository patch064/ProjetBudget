<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('projets_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('budget_id');
            $table->timestamps();
            $table->foreign('projet_id')
                ->references('id')
                ->on('Projet')
                ->onDelete('cascade');
            $table->foreign('budget_id')
                ->references('id')
                ->on('Budget')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets_budgets');
    }
}
