<?php
session_start();

if(isset($_POST['login'])){
    if($_POST['username']=="Fera Safira" && $_POST['password']=="3102"){
        $_SESSION['login']=true;
        $_SESSION['nama']="Fera Safira";
        header("Location: dashboard.php");
    } else {
        $error="Login gagal!";
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="bg-login">
<div class="login-box">

<div class="login-left">
<h2>Login</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
<input class="input" name="username" placeholder="Username">
<input class="input" type="password" name="password" placeholder="Password">
<button class="btn" name="login">LOGIN</button>
</form>
</div>

<div class="login-right"></div>

</div>
</div>