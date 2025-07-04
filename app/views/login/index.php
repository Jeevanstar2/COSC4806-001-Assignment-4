<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login Page</h2>
    <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>
    <form method="POST" action="index.php?action=verify">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="index.php?action=register">Create one</a></p>
</body>
</html>
