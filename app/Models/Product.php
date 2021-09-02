<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
//    public function getCategory()
//    {
//        return $category = Category::find($this->category_id);
//    }

    // избегаем ошибку:
    // Add [code] to fillable property to allow mass assignment on [App\Models\Category].
    // при отправке формы сюда
    protected $fillable = ['code', 'name', 'category_id', 'description', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount() // подсчет общей суммы товара в корзине
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
