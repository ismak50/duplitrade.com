<?php

namespace App\Console\Commands;

use App\Mail\SendDailyActiveRental;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailActiveRentals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:send-email-active-rentals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Active Rentals Mail Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $active_rentals = Movie::with('users')->active()->get()->mapWithKeys(function($item) {
            return [$item['id'] =>['name' => $item['name'], 'users' => [$item->users]]];
        });
        Mail::to(config('app.dailyActiveRentalEmail'))->queue( new SendDailyActiveRental($active_rentals));
    }
}
