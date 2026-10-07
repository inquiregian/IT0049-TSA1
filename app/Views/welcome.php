<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="/css/style.css?v=20261007-2">
</head>

<body>
        <?= view('partials/nav') ?>

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