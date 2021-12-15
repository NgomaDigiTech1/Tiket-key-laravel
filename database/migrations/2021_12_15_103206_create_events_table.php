<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('event_name');
            $table->text('description');
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->date('signing_at')->nullable();
            $table->date('logout_at')->nullable();
            $table->timestamps();
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
