<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Vehicle;
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

    public function create(): View
    {
        // Render view
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        return view('orders.create', compact('customers', 'vehicles'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Create order
        Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->id_card,
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id
        ]);

        // Redirect and show message
        return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $order_id): View
    {
        // Get order by ID
        $order = Order::findOrFail($order_id);

        // Render view with order
        return view('orders.show', compact('order'));
    }

    public function edit(string $order_id): View
    {
        // Get order by ID
        $order = Order::findOrFail($order_id);
        
        // Render view
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Render view with order
        return view('orders.edit', compact('order', 'customers', 'vehicles'));
    }

    public function update(Request $request, $order_id): RedirectResponse
    {
        // Get order by ID
        $order = Order::findOrFail($order_id);

        $order->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->id_card,
        ]);

        // Redirect to index
        return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($order_id): RedirectResponse
    {
        // Get order by ID
        $order = Order::findOrFail($order_id);

        // Delete order
        $order->delete();

        // Redirect to index
        return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
