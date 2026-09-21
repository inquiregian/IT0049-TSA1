<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getTodayTasks(),
            'today' => date('F j, Y'),
        ];

        return view('welcome', $data);
    }
}