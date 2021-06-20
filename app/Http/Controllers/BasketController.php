<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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

    public function basketConfirm(Request $request) // подтверждение заказа
    {
        $orderId = session('orderId'); // получаем id из сессии
        $order = Order::find($orderId); // достаем из БД заказ из сессии
        $success = $order->saveOrder($request->name, $request->phone); // сохраняем заказ

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            session()->flash('warning', 'Произошла ошибка');
        }

        // dd($request->all());
        return redirect()->route('index');
    }

    public function basketPlace() // оформляем заказ
    {
        $orderId = session('orderId'); // получаем id из сессии
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId); // достаем из БД заказ из сессии

        return view('order', compact('order')); // передаем в шаблон
    }

    public function basketAdd($productID) // добавляем товар в корзину
    {
        $orderId = session('orderId'); // получаем id из сессии

        if (is_null($orderId)) {
            $order = Order::create(); // заносим в БД
            session(['orderId' => $order->id]); // создаем сессию
        } else {
            $order = Order::find($orderId); // достаем из БД заказ из сессии
        }

        if ($order->products->contains($productID)) { // проверим, есть ли такой товар в корзине
            // в строке ниже products() SQL запрос, а без () не SQL
            $pivotRow = $order->products()->where('product_id', $productID)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productID); // если еще нет, то просто добавляем в заказ
        }

        $product = Product::find($productID); // достаем товар
        session()->flash('success', 'Добавлен товар: ' . $product->name); // выводим сообщение

        return redirect()->route('basket'); // перекидываем в корзину
    }

    public function basketRemove($productID) // убавляем товар в корзине
    {
        $orderId = session('orderId'); // получаем id из сессии
        if (is_null($orderId)) {
            return redirect()->route('basket'); // если нет заказа, то просто вернем в корзину
        }
        $order = Order::find($orderId); // достаем из БД заказ

        if ($order->products->contains($productID)) { // проверим, есть ли такой товар в корзине
            // в строке ниже products() SQL запрос, а без () не SQL
            $pivotRow = $order->products()->where('product_id', $productID)->first()->pivot;

            if ($pivotRow->count < 2) {
                $order->products()->detach($productID); // удаляем товар из корзины
            } else {
                $pivotRow->count--;
                $pivotRow->update(); // уменьшаем на 1 в БД
            }
        } else {
            $order->products()->attach($productID); // если еще нет, то просто добавляем в заказ
        }

        $product = Product::find($productID); // достаем товар
        session()->flash('warning', 'Удален товар: ' . $product->name); // выводим сообщение

        return redirect()->route('basket'); // перекидываем в корзину
    }
}
