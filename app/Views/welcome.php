<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav>
        <a href="/">Today</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    <main class="container">
        <header class="page-header">
            <p class="eyebrow">Daily Dashboard</p>
            <h1>Tasks for Today</h1>
            <p><?= esc($today) ?></p>
        </header>

        <?php if (! empty($tasks)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['title']) ?></td>
                            <td>
                                <span class="status <?= esc($task['status']) ?>">
                                    <?= esc(ucfirst($task['status'])) ?>
                                </span>
                            </td>
                            <td><?= esc($task['task_date']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-message">There are no tasks scheduled for today.</p>
        <?php endif; ?>
    </main>
</body>

</html>