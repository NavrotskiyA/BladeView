<?php

namespace App\Models\TaskHistory;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $task_id
 * @property $label_id
 *
 * Read-only
 * @property $id
 * @property $unmarked_at
 */
class LabelHistory extends Model
{
    use HasFactory;
    public function __construct(array $attributes = [])
    {
        $this->timestamps = false;
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
