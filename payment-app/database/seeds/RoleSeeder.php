<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Role::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        
        Role::create(['name' => 'nnra_admin', 'user_type' => 'nnra_user', 'display_name' => 'NNRA Administrator', 'description' => 'NNRA Administrator']);
        Role::create(['name' => 'dsp_admin', 'user_type' => 'dsp_user', 'display_name' => 'DSP Administrator', 'description' => 'DSP Administrator']);
    }
}
