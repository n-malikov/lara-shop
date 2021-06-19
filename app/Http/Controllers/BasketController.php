<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId'); // ищем сессию "заказ"
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId); // ищем в БД, если нет, то возвращаем ошибку
        }
        return view('basket', compact('order'));
    }

    public function basketOrder()
    {
        return view('order');
    }

    public function basketAdd($productID) // добавляем товар в корзину
    {
        $orderId = session('orderId'); // ищем сессию "заказ"

        if (is_null($orderId)) {
            $order = Order::create(); // заносим в БД
            session(['orderId' => $order->id]); // создаем сессию
        } else {
            $order = Order::find($orderId); // достаем из БД заказ из сессии
        }

        $order->products()->attach($productID); // добавляем в заказ прилетевший продукт

        return view('basket', compact('order')); // возвращаем обратно в корзину
    }
}
