<?php

namespace App\Models\TaskHistory;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $task_id
 * @property $title
 * @property $creator_id
 * @property $content
 * @property $status_id
 *
 * @property $labels
 * @property $status
 */
class TaskHistory extends Model
{
    use HasFactory;
    public function __construct()
    {
        $this->timestamps = false;
    }

    public function currentTask()
    {
        return $this->hasOne(Task::class);
    }
}
