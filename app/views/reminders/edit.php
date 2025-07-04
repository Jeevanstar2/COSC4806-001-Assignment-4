<!DOCTYPE html>
<html>
<head>
    <title>Edit Reminder</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Edit Reminder</h2>

    <form method="POST" action="index.php?action=update_reminder&id=<?= $reminder['id'] ?>">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pending" <?= $reminder['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $reminder['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>

        <button type="submit">Update Reminder</button>
    </form>

    <p><a href="index.php?action=reminder">Back to Reminders</a></p>
</body>
</html>
