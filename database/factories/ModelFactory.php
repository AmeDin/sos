<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Cartalyst\Sentinel\Users\EloquentUser::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'permissions' => [],
    ];


});

$factory->define(Cartalyst\Sentinel\Activations\EloquentActivation::class, function (Faker\Generator $faker) {

    return [
        'user_id' => factory(Cartalyst\Sentinel\Users\EloquentUser::class)->create()->id,
        'code' => str_random(32),
        'completed' => 1,
        'completed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$autoIncrement = autoIncrement();

$factory->define(Cartalyst\Sentinel\Roles\EloquentRole::class, function () use ($autoIncrement) {
    $autoIncrement->next();
    if ($autoIncrement->current() == 1){
        $name = "admin";
    }else{
        $name = "svendor";
    }

    return [
        'name' => $name,
        'slug' => $name,
        'permissions' => []
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\RoleUser::class, function () use ($autoIncrement) {
    $autoIncrement->next();
    if ($autoIncrement->current() == 1){
        return [
            'user_id' => $autoIncrement->current(),
            'role_id' => 1
        ];
    }else{
        return [
            'user_id' => $autoIncrement->current(),
            'role_id' => 2
        ];
    }

});

$autoIncrement = autoIncrement();

$factory->define(App\Category::class, function () use ($autoIncrement) {
    $categories = ['Staples', 'Meat', 'Vegetable', 'Seafood', 'Nut', 'Sauce', 'Drinks', 'Desert'];
    $autoIncrement->next();
    return [
        'name' => $categories[$autoIncrement->current()-1]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Ingredient::class, function () use ($autoIncrement) {
    $autoIncrement->next();

    // 19 ingredients atm
    $ingredients = [['White Rice', 0.25, 1], ['Lemak Rice', 0.50, 1], ['Seasoned Rice', 0.50, 1],
                    ['Whole Chicken', 6.50, 2], ['1/2 Chicken', 4.00, 2], ['Small Chicken', 1.50, 2],
                    ['Carrot', 0.20, 3], ['Lettuce', 0.20, 3], ['Onion', 0.2, 3], ['Cucumber', 0.2, 3],
                    ['Trout', 3.50, 4], ['Salmon', 4.00, 4], ['Tilapia', 1.50, 4], ['Prawn', 1.50, 4],
                    ['Fish cake', 0.50, 4], ['Peanut', 0.10, 5], ['Sambal', 0.00, 6], ['Mayonnaise', 0.00, 6],
                    ['Hot dog', 0.50, 2]]
    ;
    return [
        'name' => $ingredients[$autoIncrement->current()-1][0],
        'price' => $ingredients[$autoIncrement->current()-1][1],
        'category_id' => $ingredients[$autoIncrement->current()-1][2]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Nutrition::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    // 16 ingredients atm
    $nutritions = array();
    ;
    for($i=0; $i< 19; $i++){
        array_push($nutritions, [$faker->numberBetween($min = 100, $max = 900),
                                 $faker->numberBetween($min = 100, $max = 900),
                                 $faker->numberBetween($min = 0, $max = 9),
                                 $faker->numberBetween($min = 0, $max = 3),
                                 $faker->numberBetween($min = 5, $max = 20),
                                 $faker->numberBetween($min = 0, $max = 9),
                                 $faker->numberBetween($min = 0, $max = 9),
                                 ]);
    }
    return [
        'calories' => $nutritions[$autoIncrement->current()-1][0],
        'carbohydrate' => $nutritions[$autoIncrement->current()-1][1],
        'saturate_fat' => $nutritions[$autoIncrement->current()-1][2],
        'trans_fat' => $nutritions[$autoIncrement->current()-1][3],
        'fibre' => $nutritions[$autoIncrement->current()-1][4],
        'sugar' => $nutritions[$autoIncrement->current()-1][5],
        'protein' => $nutritions[$autoIncrement->current()-1][6],
        'ingredient_id' => $autoIncrement->current()
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Image::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    $url = ["muslim.png"];
    return [
        'url' => $url[$autoIncrement->current()-1]
    ];


});

$factory->define(App\Stall::class, function ()  {

    return [
        'name' => 'Muslim',
        'user_id' => 2,
        'image_id' => 1
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Image::class, function () use ($autoIncrement) {
    $autoIncrement->next();

    $url = ["muslim.png"];
    return [
        'url' => $url[$autoIncrement->current()-1]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Dish::class, function () use ($autoIncrement) {
    $autoIncrement->next();
    $dishes = [['Nasi Lemak', 1, 2], ['Nasi Ayam', 1, 3]];

    return [
        'name' => $dishes[$autoIncrement->current()-1][0],
        'stall_id' => $dishes[$autoIncrement->current()-1][1],
        'image_id' => $dishes[$autoIncrement->current()-1][2]
    ];


});


$factory->define(App\Promotion::class, function (Faker\Generator $faker) {

    return [
        'name' => "Discount after 3pm",
        'description' => "Price cut for Nasi Lemak by $2 after 3pm!",
        'price' =>  2.00 ,
        'stall_id' => '1',
        'image_id' => 4,
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date' => $faker->date($format = 'Y-m-d', $min = 'now', $max = 'now')

    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Image::class, function () use ($autoIncrement) {
    $autoIncrement->next();

    $url = ["muslim.png", "nasi-lemak.jpg", "nasi-ayam.jpg", "discount.png"];
    return [
        'url' => $url[$autoIncrement->current()-1]
    ];


});

$autoIncrement = autoIncrement();
$autoIncrementX = autoIncrement();
$autoIncrementY = autoIncrement();

$factory->define(App\DishIngredient::class, function () use ($autoIncrement, $autoIncrementX, $autoIncrementY)  {

    $recipes = [[2,6,10,16,17],[3,5,8]];

    if($autoIncrement->current()==5){
        $autoIncrementX->next();
        $autoIncrementY->next();
    }else if($autoIncrement->current()>5){
        $autoIncrementY->next();
    }
    $autoIncrement->next();

    if($autoIncrementX->current()==0){
        return [
            'dish_id' => 1,
            'ingredient_id' => $recipes[0][$autoIncrement->current()-1]
        ];
    }else{

        $autoIncrement->next();
        return [
            'dish_id' => 2,
            'ingredient_id' => $recipes[1][$autoIncrementY->current()-1]
        ];
    }

});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
