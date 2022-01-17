<?php

namespace App\Services\TaskHistory;

use App\Models\Task\Task;
use App\Models\TaskHistory\LabelHistory;

class TaskHistory
{
    private $task;

    /**
     * @param Task $task
     * @return void
     * Saving changed attributes of task to history, other - null by default. If that have no changes it save all task data to history
     */
    public function saveTaskHistory(Task $task, bool $fullSave = true)
    {
        $taskHistory = new \App\Models\TaskHistory\TaskHistory();
        if($task->isDirty() && !$fullSave){
            foreach ($task->getDirty() as $key => $dirty){
               $taskHistory->$key = $task->getOriginal("$key");
            }
        } else{
            foreach ($task->getAttributes() as $key => $attribute){
                if(strpos($key,'_at') === false && $key != 'id'){
                    $taskHistory->$key = $attribute;
                }
            }
        }
        $taskHistory->task_id = $task->id;
        $taskHistory->save();
    }

    public function saveLabelHistory(int $taskId, int $labelId)
    {
        $labelHistory = new LabelHistory();
        $labelHistory->task_id = $taskId;
        $labelHistory->label_id = $labelId;
        $labelHistory->timestamps = false;
        $labelHistory->save();
    }

}
