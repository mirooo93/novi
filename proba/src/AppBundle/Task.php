<?php

namespace AppBundle; 

class Task
{
    protected $task;
   
    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }
}


