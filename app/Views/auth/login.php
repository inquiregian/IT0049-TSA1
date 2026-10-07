<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Tasks for Today</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?= view('partials/nav') ?>

    <main class="container">
        <header class="page-header">
            <p class="eyebrow">Account Access</p>
            <h1>Login</h1>
            <p>Sign in to create, edit, and archive tasks.</p>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <p class="alert success">
                <?= esc(session()->getFlashdata('success')) ?>
            </p>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <p class="alert error">
                <?= esc(session()->getFlashdata('error')) ?>
            </p>
        <?php endif; ?>

        <?php $errors = session()->getFlashdata('errors') ?? []; ?>

        <form action="<?= site_url('login') ?>" method="post" class="task-form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= esc(old('username')) ?>"
                    autocomplete="username"
                    required
                >
                <?php if (isset($errors['username'])): ?>
                    <small class="field-error"><?= esc($errors['username']) ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >
                <?php if (isset($errors['password'])): ?>
                    <small class="field-error"><?= esc($errors['password']) ?></small>
                <?php endif; ?>
            </div>

            <button type="submit" class="button primary">Login</button>
        </form>
    </main>
</body>

</html>