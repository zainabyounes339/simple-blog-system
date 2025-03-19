<?php
$host = "localhost";  // اسم السيرفر (في XAMPP أو WAMP يكون localhost)
$username = "root";   // اسم المستخدم الافتراضي
$password = "";       // كلمة المرور (تترك فارغة في XAMPP)
$database = "BlogDB"; // اسم قاعدة البيانات التي أنشأتها

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($host, $username, $password, $database);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// ضبط الترميز لضمان دعم اللغة العربية
$conn->set_charset("utf8");
?>
