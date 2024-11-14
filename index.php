<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['login_time'])) {
    $_SESSION['login_time'] = time();
} elseif (time() - $_SESSION['login_time'] > 10) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Halaman Index</h1>
<p>Selamat datang <b><?php echo $_SESSION['username']; ?> </b>Anda berhasil login.</p>
<span id="timer">10</span>

<script>
let timeLeft = 10;
setInterval(() => {
    if (timeLeft <= 1) {
        window.location.href = 'login.php';
    }
    document.getElementById('timer').textContent = --timeLeft;
}, 1000);
</script>

</body>
</html>
