<?php

namespace App\Observers;

use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class ProposalObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Proposal "created" event.
     */
    public function created(Proposal $proposal): void
    {
    }

    /**
     * Generate code when item is created
     */
    private function generateCode(Proposal $model)
    {
    }


    /**
     * Handle the Proposal "updated" event.
     */
    public function updated(Proposal $proposal): void
    {
        //
    }

    /**
     * Handle the Proposal "deleted" event.
     */
    public function deleted(Proposal $proposal): void
    {
        //
    }

    /**
     * Handle the Proposal "restored" event.
     */
    public function restored(Proposal $proposal): void
    {
        //
    }

    /**
     * Handle the Proposal "force deleted" event.
     */
    public function forceDeleted(Proposal $proposal): void
    {
        //
    }
}
