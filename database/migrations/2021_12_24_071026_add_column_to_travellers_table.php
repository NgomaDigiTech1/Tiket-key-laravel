<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('travellers', function (Blueprint $table) {
            $table->string('id_number')->nullable();
        });
    }

    public function down()
    {
        Schema::table('travellers', function (Blueprint $table) {
            //
        });
    }
};
