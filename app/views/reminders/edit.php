<!DOCTYPE html>
<html>
<head>
    <title>Edit Reminder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Reminder</h2>
    <form action="index.php?action=reminder&task=update&id=<?= $reminder['id'] ?>" method="POST">
        <label>Subject:</label>
        <input type="text" name="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required>
        <button type="submit">Update</button>
    </form>
    <p><a href="index.php?action=reminder">Back to Reminders</a></p>
</body>
</html>
