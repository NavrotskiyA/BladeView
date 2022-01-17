<?php

namespace App\Models\Task;

use App\Models\TaskHistory\TaskHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $title
 * @property $creator_id
 * @property $content
 * @property $status_id
 *
 * @property $labels
 * @property $status
 */
class Task extends Model
{
    use HasFactory;
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
    public function taskHistories()
    {
        return $this->hasMany(TaskHistory::class);
    }
}
