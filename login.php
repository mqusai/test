<?php
require_once 'config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $u = mysqli_real_escape_string($conn, $username);
    $pmd5 = md5($password);
    $sql = "SELECT id, name,username FROM employees WHERE username='$u' AND password='$pmd5' LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if ($res && mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        header('Location: vehicles.php');
        exit;
    } else {
        $error = 'اسم المستخدم أو كلمة المرور غير صحيحة';
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل دخول الموظف</title>
  <link rel="stylesheet" href="style.css">
</head>
<body dir="rtl">
  <div class="container">
    <h2>تسجيل دخول الموظف</h2>
    <?php if ($error): ?>
      <div class="message error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="form-row">
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
      </div>
      <button class="btn" type="submit">دخول</button>
    </form>
    <p class="erd-note">المستخدم الافتراضي: اسم المستخدم <b>admin</b> وكلمة المرور <b>123456</b> بعد استيراد قاعدة البيانات.</p>
  </div>
</body>
</html>