<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // subscription's invoices
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function invoice($invoiceId) {
        return $this->invoices()->where('id', $invoiceId)->first();
    }

    public function latestInvoice() {
        return $this->invoices()->latest()->first();
    }
}
