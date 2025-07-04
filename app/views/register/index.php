<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create Account</h2>
    <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>
    <form action="index.php?action=store" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p><a href="index.php?action=login">Back to Login</a></p>
</body>
</html>
