<?php

class TaskList {
    private array $tasks = [];

    public function add(Task $task): void {
        $this->tasks[] = $task;
    }

    public function getByIndex(int $index): ?Task {
        if ($index < 0) {
            throw new \InvalidArgumentException("Index cannot be negative.");
        }
        return $this->tasks[$index] ?? null;
    }
    
    public function getById(int $id): ?Task {
        foreach ($this->tasks as $task) {
            if ($task->id === $id) {
                return $task;
            }
        }
        return null;
    }
    
}