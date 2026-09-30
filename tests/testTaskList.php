<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Task.php';
require_once __DIR__ . '/../src/TaskList.php';

class TestTaskList extends TestCase {
    
    public function testGetByIndexOnEmptyListReturnsNull(): void {
        $taskList = new TaskList();
        $result = $taskList->getByIndex(0);
        
        $this->assertNull($result);
    }
    
    public function testAddAndRetrieveSingleTask(): void {
        $taskList = new TaskList();
        $task = new Task(1, 'First Task');
        
        $taskList->add($task);
        $retrievedTask = $taskList->getByIndex(0);
        
        $this->assertSame($task, $retrievedTask);
    }
}