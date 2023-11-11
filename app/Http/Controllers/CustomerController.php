<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\Request;

// Return type redirectResponse
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        // Get customers
        $customers = Customer::latest()->paginate(10);

        // Render view with customers
        return view('customers.index', ["active_customers" => "active"], compact('customers'));
    }

    public function create(): View
    {
        // Render view
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Create customer
        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->id_card,
        ]);

        // Redirect and show message
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $customer_id): View
    {
        // Get customer by ID
        $customer = Customer::findOrFail($customer_id);

        // Render view with customer
        return view('customers.show', compact('customer'));
    }

    public function edit(string $customer_id): View
    {
        // Get customer by ID
        $customer = Customer::findOrFail($customer_id);

        // Render view with customer
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $customer_id): RedirectResponse
    {
        // Get customer by ID
        $customer = Customer::findOrFail($customer_id);

        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'id_card' => $request->id_card,
        ]);

        // Redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($customer_id): RedirectResponse
    {
        // Get customer by ID
        $customer = Customer::findOrFail($customer_id);

        // Delete customer
        $customer->delete();

        // Redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
