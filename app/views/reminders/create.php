<!DOCTYPE html>
<html>
<head><title>Create Reminder</title></head>
<body>
    <h2>Create a New Reminder</h2>
    <form method="POST" action="index.php?action=storeReminder">
        <label>Reminder:</label><br>
        <textarea name="subject" required rows="4" cols="40"></textarea><br><br>
        <button type="submit">Create</button>
    </form>
    <p><a href="index.php?action=reminder">Back</a></p>
</body>
</html>
