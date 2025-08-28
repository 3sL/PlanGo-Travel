<?php
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

session_start();
include('db.php');  // استدعاء ملف الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // التحقق من الحقول المدخلة
    if (!empty($email) && !empty($password)) {
        // استعلام للتحقق من المستخدم
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // التحقق من كلمة المرور
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user"] = $user['email'];  // تخزين البيانات في الجلسة
            header("Location: welcome.php");  // إعادة توجيه المستخدم إلى صفحة الترحيب
            exit;
        } else {
            echo "<script>alert('البريد الإلكتروني أو كلمة المرور غير صحيحة');</script>";
        }
    } else {
        echo "<script>alert('الرجاء ملء جميع الحقول');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>تسجيل الدخول إلى تطبيق مشاوير</h1>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
        <input type="password" name="password" placeholder="كلمة المرور" required><br>
        <button type="submit">تسجيل الدخول</button>
    </form>

    <a href="register.php">لا تمتلك حساب؟ سجل الآن!</a>

</body>
</html>

