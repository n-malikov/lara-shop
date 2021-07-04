<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function getFullPrice() // подсчет суммы всего, что есть в корзине
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone) // сохраняем заказ
    {
        if ($this->status == 0) { // только если еще не подтвержден
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId'); // удаляем сессию
            return true;
        } else {
            return false;
        }
    }
}
