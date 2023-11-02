<?php

namespace Tests\Feature;

use App\Jobs\SendInvoice;
use App\Models\Invoice;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Notification;
use Tests\TestCase;

class SendInvoiceTest extends TestCase
{
    /** @test */
    function it_sends_an_invoice_to_a_user()
    {
        Notification::fake();

        // Given I have a user
        $user = User::factory()->create();

        // and an invoice
        $invoice = Invoice::factory()->create();

        // when I dispatch the SendInvoice job
        SendInvoice::dispatch($invoice, $user);


        // a notification should be sent to the user
        Notification::assertSentTo($user, InvoicePaid::class);
   }
}
