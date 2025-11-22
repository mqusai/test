<?php
// إعادة توجيه بسيطة حسب حالة تسجيل الدخول
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: vehicles.php');
} else {
    header('Location: login.php');
}
exit;
?>