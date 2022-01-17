<?php

namespace App\Services\TaskHistory\Facade;

use Illuminate\Support\Facades\Facade;

class TaskHistoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TaskHistory';
    }
}
