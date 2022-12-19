<?php

namespace App\Listeners;

use App\Events\SelectDepartment;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetEmployee
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
     * @param  object  $event
     * @return void
     */
    public function handle(SelectDepartment $event)
    {
        return Employee::where('department_id', $event->id)->get();
    }
}
