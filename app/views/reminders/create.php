<?php require 'app/views/templates/header.php'; ?>
<h2>Create Reminder</h2>
<form method="POST" action="index.php?action=reminder/store">
    Subject: <input type="text" name="subject" required><br><br>
    <input type="submit" value="Save">
</form>
<?php require 'app/views/templates/footer.php'; ?>
