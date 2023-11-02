<?php

namespace App\Models;

use App\Jobs\SendInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function downloadPath()
    {
        return storage_path("app/{$this->id}.pdf");
    }

    public function send(User $user)
    {
        SendInvoice::dispatch($this, $user);
    }
}
