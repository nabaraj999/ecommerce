<?php

namespace App\Observers;

use App\Mail\VendorApprovelNotification;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VendorObserver
{

    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        //
    }


    //  public function saving (Vendor $vendor): void
    // {
    //     $vendor->date ="helll";
    // }
    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
    {
        if ($vendor->isDirty( 'status') && $vendor->status == 'approved') {
            $password = rand(11111, 99999);
            $vendor->password = Hash::make($password);
            $vendor->saveQuietly();
            Mail::to($vendor->email)->send(new VendorApprovelNotification($vendor, $password));
        }
    }

    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}
