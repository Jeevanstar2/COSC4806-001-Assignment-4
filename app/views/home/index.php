<?php
$username   = $username   ?? 'User';
$loginTime  = $loginTime  ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=1024">
  <title>Dashboard</title>
  <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
  <div class="container home-center">
    <h2>Hello, <?= htmlspecialchars($username) ?>!</h2>

    <?php if ($loginTime): ?>
      <p>You logged in at <?= date('F j, Y \a\t g:i A', strtotime($loginTime)) ?></p>
    <?php endif; ?>

    <p><a class="button-link" href="/reminders">View Your Reminders</a></p>
    <p><a class="button-link" href="/logout">Logout</a></p>
  </div>
</body>
</html>
