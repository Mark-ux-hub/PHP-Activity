<?php
$emailErr = $passErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $emailErr = "Invalid email format";
        }
    }

   
    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (!preg_match("/^.{6,}$/", $password)) {
            $passErr = "Password must be at least 6 characters";
        }
    }

    if ($emailErr == "" && $passErr == "") {
        echo "<p class='success'>Login successful!</p>";
    }
}
?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-box">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span><br><br>

        <label>Password:</label><br>
        <input type="password" name="password">
        <span class="error"><?php echo $passErr; ?></span><br><br>

        <input type="submit" value="Login">
    </form>
</div>

<?php include 'footer.php'; ?>

