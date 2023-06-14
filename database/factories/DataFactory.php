<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => "admin@gmail.com",
        'email_verified_at' => now(),
        'password' => bcrypt("11111111"), // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(\App\Entities\Banner::class, function (Faker $faker) {
    $number = random_int(1, 1000);
    return [
        'name' => 'Ảnh' . $faker->username,
        'image' => "/storage/banners/" . random_int(1000, 9000) . '.jpg',
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Product::class, function (Faker $faker) {
    return [
        'code' => random_int(1000, 9000),
        'name' => "product " . random_int(1000, 9000),
        'description' => "Mô tả " . random_int(1000, 9000),
        'content' => "Nội dung " . random_int(1000, 9000),
        'image' => "/storage/products/" . random_int(1000, 9000) . '.jpg',
        'images' => "[\"\\/storage\\/products\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\/storage\\/products\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
        'price' => 1000000,
        'price_old' => 900000,
        'brand_id' => random_int(1, 20),
        'status' => 1,
        'style' => "Kiểu " . random_int(1, 20),
        'condition' => random_int(1, 2),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Brand::class, function (Faker $faker) {
    return [
        'name' => 'Thương hiệu ' . random_int(1000, 9000),
        'image' => "/storage/brands/" . random_int(1000, 9000) . '.jpg',
        'status' => 1,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Category::class, function (Faker $faker) {
    return [
        'name' => 'Chuyên mục ' . random_int(1000, 9000),
        'image' => "/storage/categories/" . random_int(1000, 9000) . '.jpg',
        'status' => 1,
        'parent_id' => random_int(0, 20),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Contact::class, function (Faker $faker) {
    return [
        'name' => "Câu hỏi " . random_int(1, 20),
        'email' => $faker->unique()->safeEmail,
        'phone' => random_int(100000000, 999999999),
        'address' => "Địa chỉ " . random_int(1, 20),
        'content' => "Nội dung " . random_int(1, 20),
        'status' => 0,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'otp' => random_int(100000, 999999),
        'avatar' => "/storage/avatar/" . random_int(1000, 9000) . 'jpg',
        'cover_image' => "/storage/cover_image/" . random_int(1000, 9000) . 'jpg',
        'description' => "Mô tả " . random_int(1, 20),
        'address' => "Địa chỉ " . random_int(1, 20),
        'status' => 1,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt(11111111), // password
        'remember_token' => Str::random(10),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Page::class, function (Faker $faker) {
    return [
        'name' => "Page " . random_int(1, 20),
        'content' => "Nội dung page " . random_int(1, 20),
        'status' => 1,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
$factory->define(\App\Entities\Post::class, function (Faker $faker) {
    return [
        'name' => "Post " . random_int(1, 20),
        'image' => "/storage/posts/" . random_int(1, 20) . '.jpg',
        'description' => "Mô tả " . random_int(1, 20),
        'views' => random_int(1000, 9000),
        'content' => "Nội dung Post " . random_int(1, 20),
        'status' => 1,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

DB::table('category_brand')->insert([
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'brand_id' => random_int(1, 20)
    ],
]);
DB::table('product_category')->insert([
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
    [
        'category_id' => random_int(1, 20),
        'product_id' => random_int(1, 20)
    ],
]);
