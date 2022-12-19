<?php

namespace App\Listeners;

use App\Events\SelectCompany;
use App\Models\Department;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetDepartment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(SelectCompany $event)
    {
       return Department::where('company_id', $event->id)->get();
    }
}
