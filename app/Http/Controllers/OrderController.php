<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;

// Return type redirectResponse
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        // Get orders
        $orders = Order::latest()->paginate(10);

        // Render view with orders
        return view('orders.index', ["active_orders" => "active"], compact('orders'));
    }
}
