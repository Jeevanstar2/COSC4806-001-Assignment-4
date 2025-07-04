<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>

    <p><a href="index.php?action=reminder">Manage Reminders</a></p>
    <p><a href="index.php?action=logout">Logout</a></p>
</body>
</html>