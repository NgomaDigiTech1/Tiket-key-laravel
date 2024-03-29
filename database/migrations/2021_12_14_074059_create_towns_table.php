<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name_town');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('towns');
    }
};
