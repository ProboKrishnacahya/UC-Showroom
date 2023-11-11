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
}
