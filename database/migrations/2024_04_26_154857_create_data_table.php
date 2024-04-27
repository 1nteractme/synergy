<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table -> id();
            $table -> string(column:'first_name');
            $table -> string(column:'second_name');
            $table -> string(column:'last_name');
            
            $table -> string(column:'passport_series');
            $table -> string(column:'passport_number');

            $table -> string(column:'email');
            $table -> string(column:'password');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
