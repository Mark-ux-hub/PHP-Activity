<?php
$nameErr = $emailErr = $passErr = "";
$fullname = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (empty($_POST["fullname"])) {
        $nameErr = "Name is required";
    } else {
        $fullname = $_POST["fullname"];
        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

   
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
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $password)) {
            $passErr = "At least 6 chars, letters & numbers only";
        }
    }

    if ($nameErr == "" && $emailErr == "" && $passErr == "") {
        echo "<p class='success'>Registration successful!</p>";
    }
}
?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-box">
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label>Full Name:</label><br>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>">
        <span class="error"><?php echo $nameErr; ?></span><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span><br><br>

        <label>Password:</label><br>
        <input type="password" name="password">
        <span class="error"><?php echo $passErr; ?></span><br><br>

        <input type="submit" value="Register">
    </form>
</div>

<?php include 'footer.php'; ?>