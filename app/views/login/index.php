<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) : ?>
        <p class="error-msg"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=verify">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="index.php?action=register">Register here</a></p>
</body>
</html>