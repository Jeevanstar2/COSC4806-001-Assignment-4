<!DOCTYPE html>
<html>
<head>
    <title>Create Reminder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>New Reminder</h2>
    <form action="index.php?action=reminder&task=store" method="POST">
        <label>Subject:</label>
        <input type="text" name="subject" required>
        <button type="submit">Save</button>
    </form>
    <p><a href="index.php?action=reminder">Back to Reminders</a></p>
</body>
</html>
