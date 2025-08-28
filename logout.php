<?php
session_start();
session_unset();  // تنظيف الجلسة
session_destroy();  // تدمير الجلسة
header("Location: login.php");  // إعادة توجيه إلى صفحة تسجيل الدخول
exit;
?>
