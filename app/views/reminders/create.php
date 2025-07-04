<!DOCTYPE html>
<html>
<head>
    <title>Add Reminder</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Create a New Reminder</h2>

    <form method="POST" action="index.php?action=store_reminder">
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        <button type="submit">Save</button>
    </form>

    <p><a href="index.php?action=reminder">Back to Reminders</a></p>
</body>
</html>
