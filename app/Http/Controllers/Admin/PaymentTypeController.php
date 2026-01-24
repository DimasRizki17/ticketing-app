<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('admin.payment_type.index', compact('paymentTypes'));
    }

    public function create()
    {
        return view('admin.payment_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:payment_types,name'
        ]);

        PaymentType::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.payment-types.index');
    }

    public function edit(PaymentType $paymentType)
    {
        return view('admin.payment_type.edit', compact('paymentType'));
    }

    public function update(Request $request, PaymentType $paymentType)
    {
        $request->validate([
            'name' => 'required|unique:payment_types,name,' . $paymentType->id
        ]);

        $paymentType->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.payment-types.index');
    }

    public function destroy(PaymentType $paymentType)
    {
        $paymentType->delete();

        return redirect()->route('admin.payment-types.index');
    }
}
