<?php

namespace App\Observers;

use App\Club;

class ClubObserver
{
    /**
     * Handle the club "created" event.
     *
     * @param  \App\Club  $club
     * @return void
     */
    public function created(Club $club)
    {
        activity()->log('Club "'.$club->name.'" is created');
    }

    /**
     * Handle the club "updated" event.
     *
     * @param  \App\Club  $club
     * @return void
     */
    public function updated(Club $club)
    {
        activity()->log('Club "'.$club->name.'" is updated');

    }

    /**
     * Handle the club "deleted" event.
     *
     * @param  \App\Club  $club
     * @return void
     */
    public function deleted(Club $club)
    {
        activity()->log('Club "'.$club->name.'" is deleted');

    }

    /**
     * Handle the club "restored" event.
     *
     * @param  \App\Club  $club
     * @return void
     */
    public function restored(Club $club)
    {
        //
    }

    /**
     * Handle the club "force deleted" event.
     *
     * @param  \App\Club  $club
     * @return void
     */
    public function forceDeleted(Club $club)
    {
        activity()->log('Club "'.$club->name.'" is deleted');

    }
}
