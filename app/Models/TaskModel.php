<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'is_archived',
        'created_at',
    ];

    public function getTodayTasks(): array
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    public function getAllTasks(): array
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }
}