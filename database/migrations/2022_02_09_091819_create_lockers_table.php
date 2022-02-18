<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Définition des colonnes de la table lockers
        Schema::create('lockers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_casier');
            $table->string('etage_casier');
            $table->string('site_casier');
            //la table infos_casier peut 'etre vide, dans ce cas la valeur sera null
            $table->mediumText('infos_casier')->nullable();
            $table->timestamps();

            //clé étrangère de la table students
            $table->foreignId('student_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lockers');
    }
}
