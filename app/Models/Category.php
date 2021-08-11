<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // избегаем ошибку:
    // Add [code] to fillable property to allow mass assignment on [App\Models\Category].
    // при отправке формы сюда
    protected $fillable = ['code', 'name', 'description', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
