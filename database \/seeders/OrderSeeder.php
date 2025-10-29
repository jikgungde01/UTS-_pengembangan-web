<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Menu;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $menus = Menu::all();
        for ($i = 0; $i < 10; $i++) {
            $menu = $menus->random();
            $quantity = $faker->numberBetween(1, 5);
            Order::create([
                'customer_name' => $faker->name,
                'quantity' => $quantity,
                'total_price' => $quantity * $menu->price,
                'menu_id' => $menu->id,
            ]);
        }
    }
}