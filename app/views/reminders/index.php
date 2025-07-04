<!DOCTYPE html>
<html>
<head><title>Your Reminders</title></head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p><a href="index.php?action=createReminder">+ New Reminder</a> | <a href="index.php?action=logout">Logout</a></p>
    <h3>Your Reminders:</h3>
    <ul>
        <?php foreach ($reminders as $reminder): ?>
            <li>
                <strong><?php echo htmlspecialchars($reminder['subject']); ?></strong> 
                (<?php echo $reminder['created_at']; ?>)
                - <a href="index.php?action=editReminder&id=<?php echo $reminder['id']; ?>">Edit</a>
                - <a href="index.php?action=deleteReminder&id=<?php echo $reminder['id']; ?>" onclick="return confirm('Delete this reminder?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
