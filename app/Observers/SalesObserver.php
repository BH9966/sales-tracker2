<?php

namespace App\Observers;

use App\Models\Sale;
use App\Helpers\LogHelper;

class SalesObserver
{
    /**
     * 
     * Handle the Sale "created" event.
     */
    public function created(Sale $sale): void
    {
        //
        LogHelper::log('Add New sale record', $sale, null, $sale->toArray());
        

    }

    /**
     * Handle the Sale "updated" event.
     */
    public function updated(Sale $sale): void
    {
        //
        $old = $sale->getOriginal(); 
        $new = $sale->getDirty();    

        if (!empty($new)) {
            LogHelper::log('update Sale', $sale, $old, $new);
    }
    }
    /**
     * Handle the Sale "deleted" event.
     */
    public function deleted(Sale $sale): void
    {
        //
            LogHelper::log('delete sale', $sale, $sale->toArray(), null);
        
    }

    /**
     * Handle the Sale "restored" event.
     */
    public function restored(Sale $sale): void
    {
        //
    }

    /**
     * Handle the Sale "force deleted" event.
     */
    public function forceDeleted(Sale $sale): void
    {
        //
    }
}
