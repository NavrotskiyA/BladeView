<?php

namespace App\Models\Task;

use App\Models\TaskHistory\TaskHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\objectHasAttribute;

/**
 * @property $id
 * @property $title
 * @property $creator_id
 * @property $content
 * @property $status_id
 *
 * @property $labels
 * @property $status
 * @property $user
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
    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
    public function setParams(array $params)
    {
        unset($params['_token']);
        unset($params['_method']);
       foreach ($params as $key => $param){
           $this->$key = $param;
       }
    }
}
