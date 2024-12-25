<?php
// Khởi tạo biến lỗi
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý dữ liệu POST

    // Kiểm tra fullname
    if (empty($_POST['fullname'])) {
        $error['fullname']['require'] = 'Bắt buộc phải nhập họ tên';
    } else {
        if (strlen($_POST['fullname']) < 5) {
            $error['fullname']['min-len'] = 'Họ và tên phải lớn hơn hoặc bằng 5 ký tự';
        }
    }

    // Kiểm tra email
    if (empty($_POST['email'])) {
        $error['email']['require'] = 'Vui lòng nhập email';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email']['format'] = 'Email không đúng định dạng';
        }
    }

    // Nếu không có lỗi
    if (empty($error)) {
        echo 'Validate thành công, không xuất hiện lỗi';
    } else {
        echo 'Có lỗi xảy ra';
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <p>
        Họ tên:
        <input type="text" name="fullname" placeholder="Họ và tên" value="<?php echo htmlspecialchars($_POST['fullname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo !empty($error['fullname']['require']) ? '<span style="color: red;">' . htmlspecialchars($error['fullname']['require'], ENT_QUOTES, 'UTF-8') . '</span>' : ''; ?>
        <?php echo !empty($error['fullname']['min-len']) ? '<span style="color: red;">' . htmlspecialchars($error['fullname']['min-len'], ENT_QUOTES, 'UTF-8') . '</span>' : ''; ?>
    </p>

    <p>
        Email:
        <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo !empty($error['email']['require']) ? '<span style="color: red;">' . htmlspecialchars($error['email']['require'], ENT_QUOTES, 'UTF-8') . '</span>' : ''; ?>
        <?php echo !empty($error['email']['format']) ? '<span style="color: red;">' . htmlspecialchars($error['email']['format'], ENT_QUOTES, 'UTF-8') . '</span>' : ''; ?>
    </p>

    <button type="submit">Xác nhận</button>
</form>
