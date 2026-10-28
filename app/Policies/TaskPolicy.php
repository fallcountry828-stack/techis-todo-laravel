<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;    

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定されたユーザーのタスクの時削除可能
     */
    public function delete(User $user, Task $task){
        return $user->id === $task->user_id;
    }
}


    
