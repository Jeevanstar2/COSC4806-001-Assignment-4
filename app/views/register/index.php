<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Create a New Account</h2>
    <?php if (!empty($error_message)) : ?>
        <p class="error-msg"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=store">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p><a href="index.php?action=login">Back to login</a></p>
</body>
</html>