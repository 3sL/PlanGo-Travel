<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "تم استقبال طلب POST بنجاح!";
} else {
    echo "الرجاء إرسال البيانات بطريقة POST";
}
?>


<form action="login.php" method="POST">
  <input type="email" name="email" required>
  <input type="password" name="password" required>
  <button type="submit">تسجيل الدخول</button>
</form>
