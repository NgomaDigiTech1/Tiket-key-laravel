<?php
declare(strict_types=1);

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Role::create(['name' => "ADMIN"]);
        Role::create(['name' => "SUPERADMIN"]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
