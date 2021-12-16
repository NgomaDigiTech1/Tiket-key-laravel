<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('trajets', function (Blueprint $table) {
            $table->integer('prices');
            $table->time('start_time')->nullable();
            $table->time('arrival_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('trajets', function (Blueprint $table) {
            //
        });
    }
};
