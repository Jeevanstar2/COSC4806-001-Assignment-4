<!DOCTYPE html>
<html>
<head><title>Edit Reminder</title></head>
<body>
    <h2>Edit Reminder</h2>
    <form method="POST" action="index.php?action=updateReminder">
        <input type="hidden" name="id" value="<?php echo $reminder['id']; ?>">
        <label>Reminder:</label><br>
        <textarea name="subject" rows="4" cols="40"><?php echo htmlspecialchars($reminder['subject']); ?></textarea><br><br>
        <button type="submit">Update</button>
    </form>
    <p><a href="index.php?action=reminder">Back</a></p>
</body>
</html>
