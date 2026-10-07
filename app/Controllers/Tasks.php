<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    private TaskModel $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        return view('tasks', [
            'tasks' => $this->taskModel->getAllTasks(),
        ]);
    }

    public function newTask()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title'       => trim((string) $this->request->getPost('title')),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit(int $id)
    {
        $task = $this->taskModel->find($id);

        if ($task === null || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function update(int $id)
    {
        $task = $this->taskModel->find($id);

        if ($task === null || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title'     => trim((string) $this->request->getPost('title')),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function archive(int $id)
    {
        $task = $this->taskModel->find($id);

        if ($task === null || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $this->taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}