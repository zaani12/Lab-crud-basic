<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        DB::table('tasks')->delete();
        
        DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'name' => 'Design Product Pages',
                'description' => '<p>Create user-friendly product pages with images and descriptions</p>',
                        
                'created_at' => now(),
                'updated_at' => now(),
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 1,
                'name' => 'Implement Shopping Cart',
                'description' => 'Develop a functional shopping cart for users to add and manage items',
        
                'created_at' => now(),
                'updated_at' => now(),
            ),

        ));
        
        
    }
}
