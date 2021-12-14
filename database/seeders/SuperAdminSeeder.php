<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $role  = Role::query()
            ->where('name' , '=', 'SUPERADMIN')
            ->first();

        User::query()
            ->create([
                'name' => "Ngoma",
                'first_name' => "Digitech",
                'picture' => asset('assets/admins/images/user.png'),
                'email' => "ngoma.digitech@ngoma.com",
                'password' => Hash::make("ngoma-digitech"),
                'role_id' => $role->id
            ]);
    }
}
