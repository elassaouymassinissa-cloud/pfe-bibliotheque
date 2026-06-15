<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "Admin";
        $admin->status = 1;

        $admin->save();

        $librarian = new Role();
        $librarian->name = "Librarian";
        $librarian->status = 1;
        $librarian->save();

        $user = new Role();
        $user->name = "User";
        $user->status = 1;
        $user->save();
    }
}
