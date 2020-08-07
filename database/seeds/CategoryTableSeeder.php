<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    private $categories = ['PHP', 'JS', 'HTML', 'CSS', 'Java', 'C++', 'C', 'C#'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category){
            DB::table('categories')->insert(['title' => $category]);
        }
    }
}
