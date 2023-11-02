<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Browsershot\Browsershot;

class SendInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Invoice $invoice, protected User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sandInvoidAsPdf();

        $this->user->notify(new InvoicePaid($this->invoice));
    }

    /**
     * @return string
     */
    public function view(): string
    {
        return view('invoices.show', [
            'invoice' => $this->invoice,
        ])->render();
    }

    /**
     * @return string
     * @throws \Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot
     */
    protected function sandInvoidAsPdf(): void
    {
        Browsershot::html($this->view())
            ->showBackground()
            ->margins(10, 10, 10, 10)
            ->save($this->invoice->downloadPath());
    }
}
