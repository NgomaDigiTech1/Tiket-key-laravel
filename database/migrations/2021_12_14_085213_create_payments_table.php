<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->integer('code_payment')->unique();
            $table->foreignId('traveller_id')
                ->constrained();
            $table->foreignId('booking_id')
                ->constrained();
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
