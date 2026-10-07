<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Task List</title>
    <link rel="stylesheet" href="/css/style.css?v=20261007-2">
</head>

<body>
    <?= view('partials/nav') ?>

    <main class="container">
        <header class="page-header">
            <p class="eyebrow">All Records</p>
            <h1>Complete Task List</h1>
            <p>Review all scheduled tasks in chronological order.</p>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <p class="alert success">
                <?= esc(session()->getFlashdata('success')) ?>
            </p>
        <?php endif; ?>

        <?php if (session()->get('is_logged_in')): ?>
            <div class="page-actions">
                <a href="<?= site_url('tasks/new') ?>" class="button primary">
                    New Task
                </a>
            </div>
        <?php endif; ?>

        <?php if (! empty($tasks)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Date</th>

                        <?php if (session()->get('is_logged_in')): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>
                            <td><?= esc($task['title']) ?></td>
                            <td>
                                <span class="status <?= esc($task['status']) ?>">
                                    <?= esc(ucfirst($task['status'])) ?>
                                </span>
                            </td>
                            <td><?= esc($task['task_date']) ?></td>

                            <?php if (session()->get('is_logged_in')): ?>
                                <td>
                                    <div class="table-actions">
                                        <a
                                            href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>"
                                            class="button small secondary"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>"
                                            method="post"
                                            onsubmit="return confirm('Archive this task?');"
                                        >
                                            <?= csrf_field() ?>
                                            <button type="submit" class="button small danger">
                                                Archive
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-message">No tasks are available.</p>
        <?php endif; ?>
    </main>
</body>

</html>