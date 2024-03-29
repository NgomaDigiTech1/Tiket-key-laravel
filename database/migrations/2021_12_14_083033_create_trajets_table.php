<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('starting_city');
            $table->string('arrival_city');
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trajets');
    }
};
