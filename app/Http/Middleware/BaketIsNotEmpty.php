<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class BaketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $orderId = session('orderId'); // получаем id из сессии

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            if ($order->products->count() == 0) {
                session()->flash('warning', 'Ваша корзина пуста');
                //return back(); // вернуться на страницу откуда перешли
                return redirect()->route('index');
            }
        }

        return $next($request);
    }
}
