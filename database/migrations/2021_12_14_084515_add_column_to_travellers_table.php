<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTravellersTable extends Migration
{
    public function up()
    {
        Schema::table('travellers', function (Blueprint $table) {
            $table->foreignId('booking_id')
                ->constrained();
        });
    }

    public function down()
    {
        Schema::table('travellers', function (Blueprint $table) {
            //
        });
    }
}
