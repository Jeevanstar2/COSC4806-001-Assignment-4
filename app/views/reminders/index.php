<?php require 'app/views/templates/header.php'; ?>
<h2>Your Reminders</h2>
<p><a href="index.php?action=reminder/create">+ New Reminder</a></p>
<ul>
<?php foreach ($reminders as $note): ?>
    <li>
        <?= htmlspecialchars($note['subject']) ?> 
        [<a href="index.php?action=reminder/edit/<?= $note['id'] ?>">Edit</a>] 
        [<a href="index.php?action=reminder/delete/<?= $note['id'] ?>" onclick="return confirm('Delete this?')">Delete</a>]
    </li>
<?php endforeach; ?>
</ul>
<?php require 'app/views/templates/footer.php'; ?>
