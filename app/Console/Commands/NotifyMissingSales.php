<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use App\Mail\MissingSalesAlert; // Ensure this import is correct and the class exists
use Carbon\Carbon;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Console\Command;

class NotifyMissingSales extends Command
{
    protected $signature = 'sales:notify-missing';
    protected $description = 'Notify admin about users who did not submit sales today';

    public function handle()
    {
        $today = Carbon::today();

        // Get all users who are registered in businesses
        $users = User::whereHas('assign_businesses')->get(); // assumes User has relation businesses()

        $missingSales = [];

        foreach ($users as $user) {
            foreach ($user->businesses as $business) {
                $saleToday = Sale::where('user_id', $user->id)
                    ->where('business_id', $business->id)
                    ->whereDate('sale_date', $today)
                    ->exists();

                if (!$saleToday) {
                    $missingSales[] = [
                        'user' => $user,
                        'business' => $business,
                    ];
                }
            }
        }

        if (!empty($missingSales)) {
            $adminEmail = 'hamisihussein999@gmail.com'; // replace with your admin email
            Mail::to($adminEmail)->send(new MissingSalesAlert($missingSales));
        }

        $this->info('Missing sales notifications sent successfully!');
    }
}