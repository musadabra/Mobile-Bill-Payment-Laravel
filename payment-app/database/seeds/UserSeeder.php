<?php

use Illuminate\Database\Seeder;
use App\User;
use App\NnraUser;
use App\DspUser;
use App\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        User::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $nnra_role = Role::where('user_type', 'nnra_user')->first();
        $dsp_role = Role::where('user_type', 'dsp_user')->first();

        $dsp = DspUser::first();
        $nnra = NnraUser::first();
        
        $nnra_class = get_class($nnra);
        $dsp_class = get_class($dsp);

        $user = User::create([
            'name' => "NNRA",
            'email' => "Nnra@nnra.gov.ng",
            'password' => bcrypt('123456'),
            'typeable_id' => $nnra->id,
            'typeable_type' => $nnra_class,
            'dsp_information_id' => 0,
            'email_verified_at' => now(),
        ]);

        $query = "INSERT INTO role_user (role_id, user_type, user_id) VALUES
                    ('$nnra_role->id', '$nnra_class', '$nnra->id')";

        DB::insert($query);

        // $user = User::create([
        //     'name' => "Nuhu Ibrahim",
        //     'email' => "musadabra@gmail.com",
        //     'password' => bcrypt('123456'),
        //     'typeable_id' => $dsp->id,
        //     'typeable_type' => $dsp_class,
        //     'dsp_information_id' => 0,
        //     'email_verified_at' => now(),
        // ]);

        // $query = "INSERT INTO role_user (role_id, user_type, user_id) VALUES
        //             ('$dsp_role->id', '$dsp_class', '$dsp->id')";
                    
        // DB::insert($query);
    }
}
