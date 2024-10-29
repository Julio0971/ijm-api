<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', [
                'Hombre',
                'Mujer',
                'Prefiero no contestar'
            ]);
            $table->tinyInteger('age');
            $table->string('speciality');
            $table->enum('grade', [1, 2, 3, 4, 5, 6, 7, 8]);
            $table->boolean('participated_before');
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('subjects');
    }
};