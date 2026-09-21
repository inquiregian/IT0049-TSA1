<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            <p class="eyebrow">Demo Account</p>
            <h1>User Profile</h1>
            <p>Information about the system's demonstration user.</p>
        </header>

        <?php if (! empty($user)): ?>
            <section class="profile-card">
                <div class="avatar">
                    <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
                </div>

                <div class="profile-details">
                    <h2><?= esc($user['full_name']) ?></h2>

                    <dl>
                        <div>
                            <dt>Username</dt>
                            <dd><?= esc($user['username']) ?></dd>
                        </div>

                        <div>
                            <dt>Email Address</dt>
                            <dd><?= esc($user['email']) ?></dd>
                        </div>

                        <div>
                            <dt>Account Created</dt>
                            <dd><?= esc($user['created_at']) ?></dd>
                        </div>
                    </dl>
                </div>
            </section>
        <?php else: ?>
            <p class="empty-message">No profile record was found.</p>
        <?php endif; ?>
    </main>
</body>

</html>