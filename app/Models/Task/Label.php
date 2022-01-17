<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $name
 * @property $color
 */
class Label extends Model
{
    use HasFactory;
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
