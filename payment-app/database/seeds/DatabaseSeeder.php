<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$this->call(RoleSeeder::class);
    	// $this->call(PermissionSeeder::class);
    	// $this->call(RoleHasPermissionSeeder::class);
        $this->call(DspInformationSeeder::class);
        $this->call(NnraUserSeeder::class);
        $this->call(DspUserSeeder::class);
        $this->call(UserSeeder::class);

        // ...Other seeders can come afterwards
    }
}
