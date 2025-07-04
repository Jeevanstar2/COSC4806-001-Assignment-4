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
        <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <p><a href="index.php?action=reminder">Back to Reminders</a></p>
</body>
</html>