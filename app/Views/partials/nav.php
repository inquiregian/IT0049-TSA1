<nav>
    <a href="<?= site_url('/') ?>">Today</a>
    <a href="<?= site_url('tasks') ?>">Task List</a>
    <a href="<?= site_url('profile') ?>">Profile</a>
    <a href="<?= site_url('about') ?>">About</a>

    <?php if (session()->get('is_logged_in')): ?>
        <form action="<?= site_url('logout') ?>" method="post" class="nav-form">
            <?= csrf_field() ?>
            <button type="submit" class="nav-link">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?= site_url('login') ?>" class="auth-link">Login</a>
    <?php endif; ?>
</nav>