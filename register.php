<?php
include('db.php');  // استدعاء ملف الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // التحقق من الحقول
    if (!empty($email) && !empty($password) && !empty($confirmPassword)) {
        if ($password === $confirmPassword) {
            // التحقق من وجود المستخدم في قاعدة البيانات
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                echo "<script>alert('البريد الإلكتروني موجود بالفعل!');</script>";
            } else {
                // تشفير كلمة المرور
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // إدخال المستخدم الجديد في قاعدة البيانات
                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
                $stmt->execute(['email' => $email, 'password' => $hashedPassword]);

                echo "<script>alert('تم التسجيل بنجاح!');</script>";
                header("Location: login.php");  // إعادة توجيه إلى صفحة تسجيل الدخول
                exit;
            }
        } else {
            echo "<script>alert('كلمة المرور غير متطابقة!');</script>";
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
    <title>تسجيل حساب جديد</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>تسجيل حساب جديد</h1>
    <form action="register.php" method="POST">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
        <input type="password" name="password" placeholder="كلمة المرور" required><br>
        <input type="password" name="confirmPassword" placeholder="تأكيد كلمة المرور" required><br>
        <button type="submit">تسجيل</button>
    </form>

    <a href="login.php">لديك حساب؟ تسجيل الدخول</a>

</body>
</html>
