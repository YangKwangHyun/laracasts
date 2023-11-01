<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoice;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class InvoiceDownloadsController extends Controller
{
    public function __invoke($invoiceId) {
        Auth::user()->sendInvoice($invoiceId);

        return 'Done';
    }
}
