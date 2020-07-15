<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
            'role' => 'superadmin',
        ]);
        Role::create([
            'role' => 'teacher',
        ]);
    	
    }
}
