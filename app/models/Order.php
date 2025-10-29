<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'quantity', 'total_price', 'menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}