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

    public function sortByColumn(string $column): void {
        if (!in_array($column, ['id', 'name'])) {
            throw new \InvalidArgumentException("Érvénytelen oszlopnév a rendezéshez.");
        }

        usort($this->tasks, function (Task $a, Task $b) use ($column) {
            return $a->$column <=> $b->$column;
        });
    }

    public function sortByName(): void {
        $this->sortByColumn('name');
    }

    public function sortById(): void {
        $this->sortByColumn('id');
    }    
}