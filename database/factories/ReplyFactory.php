<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    // 随机获取一个月以内的时间
    $time = $faker->dateTimeThisMonth();
    return [
        'content' => $sentence,
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
