<?php

namespace App\Console\Commands;

use App\Jobs\SendInvoice;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class SendLastestInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-lastest-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a user their most recently generated and paid invoice.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('What is the email address for the account?');

        $user = User::query()->where('email', $email)->firstOrFail()->sendLatestInvoice();

        $user->sendLatestInvoice();

        $this->info("Invoice delivered to {$user->email}");


        return 0;
    }
}
