<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all();
        for ($i = 0; $i < 10; $i++) {
            Menu::create([
                'name' => $faker->word . ' Menu', // e.g., "Kacang Menu"
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 50), // Harga antara 10-50
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}