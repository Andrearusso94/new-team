<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        $roles = ['president', 'ceo', 'manager', 'schiavo'];

        foreach ($roles as $role) {
            $newRole = new Role();
            $newRole->name = $role;
            $newRole->slug = Str::slug($newRole->name);
            $newRole->save();
        }
    }
}
