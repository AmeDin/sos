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
        factory(App\Ingredient::class, 19)->create();
        factory(App\Nutrition::class, 19)->create();
        factory(App\Image::class, 4)->create();
        factory(App\Stall::class, 1)->create();
        factory(App\Dish::class, 2)->create();
        factory(App\DishIngredient::class, 8)->create();
        factory(App\Promotion::class, 1)->create();
    }
}
