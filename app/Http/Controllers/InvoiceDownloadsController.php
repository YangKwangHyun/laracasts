<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class InvoiceDownloadsController extends Controller
{
    public function __invoke($invoiceId) {
        $html = view('invoices.show', [
            'invoice' => Auth::user()->subscription()->invoice($invoiceId),
        ])->render();

        Browsershot::html($html)
            ->showBackground()
            ->margins(10,10,10, 10)
            ->save(storage_path("app/{$invoiceId}.pdf"));

        return "Done";
    }
}
