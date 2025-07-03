<?php require 'app/views/templates/header.php'; ?>
<h2>Edit Reminder</h2>
<form method="POST" action="index.php?action=reminder/update/<?= $reminder['id'] ?>">
    Subject: <input type="text" name="subject" value="<?= htmlspecialchars($reminder['subject']) ?>" required><br><br>
    <input type="submit" value="Update">
</form>
<?php require 'app/views/templates/footer.php'; ?>
