<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class CustomerObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        $customerCode = $this->generateCode($customer);
        $customer->update([
            'ugyfelszam' => $customerCode
        ]);
    }



    /**
     * Generate code when item is created
     */
    private function generateCode(Customer $model)
    {
        $id = $model->id;
        return 'C' . str_pad($id, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
