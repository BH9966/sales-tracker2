<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use App\Mail\MissingSalesAlert; // Ensure this import is correct and the class exists
use Carbon\Carbon;
use App\Models\User;
use App\Models\Sale;
use App\Models\AssignBusiness;
use Illuminate\Console\Command;

class NotifyMissingSales extends Command
{
    protected $signature = 'sales:notify-missing';
    protected $description = 'Notify admin about users who did not submit sales today';

    public function handle()
    {
        $today = Carbon::today();

        // Get all users who are registered in businesses
        $missingSales = [];

        $assignments = AssignBusiness::with(['user', 'business'])->get();

        foreach ($assignments as $assign) {
            $saleToday = Sale::where('user_id', $assign->user_id)
                ->where('business_id', $assign->business_id)
                ->whereDate('sale_date', $today)
                ->exists();
    
            if (!$saleToday) {
                $missingSales[] = [
                    'user' => $assign->user,
                    'business' => $assign->business,
                ];
            }
        }
        if (!empty($missingSales)) {
            $adminEmail = 'hamisihussein999@gmail.com'; 
            Mail::to($adminEmail)->send(new MissingSalesAlert($missingSales));
        }

        $this->info('Missing sales notifications sent successfully!');
    }
}