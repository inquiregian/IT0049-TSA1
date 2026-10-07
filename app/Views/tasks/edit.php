<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task | Tasks for Today</title>
    <link rel="stylesheet" href="/css/style.css?v=20261007-2">
</head>

<body>
    <?= view('partials/nav') ?>

    <main class="container">
        <header class="page-header">
            <p class="eyebrow">Task Management</p>
            <h1>Edit Task</h1>
            <p>Update the selected task.</p>
        </header>

        <?php $errors = session()->getFlashdata('errors') ?? []; ?>

        <form
            action="<?= site_url('tasks/' . $task['id'] . '/update') ?>"
            method="post"
            class="task-form"
        >
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="title">Task Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    maxlength="150"
                    value="<?= esc(old('title', $task['title'])) ?>"
                    required
                >
                <?php if (isset($errors['title'])): ?>
                    <small class="field-error"><?= esc($errors['title']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="task_date">Task Date</label>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="<?= esc(old('task_date', $task['task_date'])) ?>"
                    required
                >
                <?php if (isset($errors['task_date'])): ?>
                    <small class="field-error"><?= esc($errors['task_date']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <?php $selectedStatus = old('status', $task['status']); ?>

                <select id="status" name="status" required>
                    <option value="pending" <?= $selectedStatus === 'pending' ? 'selected' : '' ?>>
                        Pending
                    </option>
                    <option value="completed" <?= $selectedStatus === 'completed' ? 'selected' : '' ?>>
                        Completed
                    </option>
                </select>

                <?php if (isset($errors['status'])): ?>
                    <small class="field-error"><?= esc($errors['status']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <button type="submit" class="button primary">Update Task</button>
                <a href="<?= site_url('tasks') ?>" class="button secondary">Cancel</a>
            </div>
        </form>
    </main>
</body>

</html>