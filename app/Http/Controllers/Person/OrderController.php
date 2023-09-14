<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::find($id);
        $skus = $order->skus; // Убедитесь, что вы получаете данные $skus из вашей модели

        return view('auth.orders.show', compact('order', 'skus'));
    }
}
