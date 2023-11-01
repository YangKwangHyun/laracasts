<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class InvoiceDetailController extends Controller
{
    public function __invoke($invoiceId) {
        return view('invoices.show', [
            'invoice' => Auth::user()->subscription()->invoice($invoiceId),
        ]);
    }
}
