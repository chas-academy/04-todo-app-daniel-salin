<?php

namespace Todo\Domain;

class Tasks {
    protected $task;

    public function __construct(
        string $task
    ) {
        $this->task = $task;
    }

    public function getTask() {
        return $this->task;
    }

    public function setTask($task) {
        $this->task = $task;
    }
}

?>