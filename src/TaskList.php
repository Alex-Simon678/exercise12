<?php

class TaskList {
    private array $tasks = [];

    public function add(Task $task): void {
        $this->tasks[] = $task;
    }

    public function getByIndex(int $index): ?Task {
        return $this->tasks[$index] ?? null;
    }
}