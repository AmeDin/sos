<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cartalyst\Sentinel\Roles\EloquentRole::class, 2)->create();
        factory(Cartalyst\Sentinel\Activations\EloquentActivation::class, 20)->create();
        factory(App\RoleUser::class, 20)->create();
        factory(App\Category::class, 7)->create();
        factory(App\Ingredient::class, 16)->create();
        factory(App\Nutrition::class, 16)->create();
    }
}
