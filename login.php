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