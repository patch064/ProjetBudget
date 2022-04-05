<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(20)->create();
         //\App\Models\Budget::factory(1)->create();
         //\App\Models\Projet::factory(2)->create();
        DB::table('users')->insert([
        'name' => 'nathan',
        'email' => 'azerty@azerty.fr',
        'email_verified_at' => now(),
        'password' => Hash::make('azertyuiop'),
        'remember_token' => 'ugUlI0znbQJcl1amGfcVofsBYCl4wkZSPp8njxk57f427jr7dYDoASlW4tCe',
        ]);

        DB::table('users')->insert([
            'name' => 'mawelle',
            'email' => 'bts.slam.tu.tes.perdu@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            //'remember_token' => 'ugUlI0znbQJcl1amGfcVofsBYCl4wkZSPp8njxk57f427jr7dYDoASlW4tCe',
        ]);

        DB::table('budgets')->insert([
            'libelle' => 'canard',
            'somme' => '0',
            'user_id' => 1
        ]);
        DB::table('budgets')->insert([
            'libelle' => 'canard',
            'somme' => '0',
            'user_id' => 2
        ]);
    }
}
