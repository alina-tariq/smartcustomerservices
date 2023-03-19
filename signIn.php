<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: mainpage.php");
    exit;
}
include 'connInfo.php';
$username = $password = "";
$user_error = $pass_error = $login_err = "";
?>
<div class="service2">
    <div class="container">
       <div class="row d_flex">
          <div class="col-md-12 col-lg-6">
            <div class="services_desc">
                <h2>Login</h2>
                <?php
                if (!empty($login_err)) {echo '<div class="alert alert-danger">' . $login_err . '</div>';} 
                ?>
                <form action="" method="POST">
                    <label for="username"> Username: </label>
                    <input type="text" id="username" name="username" class="form-control <?php echo (!empty($user_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $username;?>"><br><br>
                    <span class="invalid-feedback"><?php echo $user_error; ?> </span>
                    <label for="password"> Password: </label>
                    <input type="password" id="password" name="password" class="form-control <?php echo (!empty($pass_error)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $pass_error;?> </span>
                    <input type="submit" value="Login">
                </form>
            </div>
          </div>
       </div>
    </div>
</div>

<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty(trim($_POST["username"]))){
        $user_error = "Not a valid Username.";
    } elseif (empty(trim($_POST["password"]))) {
        $pass_error = "Not a valid password.";
    }
    else {
        if(isset($_POST['submit']))
        {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $findUser = "";
            $sql = "SELECT uname upassword FROM user WHERE uname = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = $username;
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $username;
                                header("location: mainpage.php");
                            } else { $login_err = "Invalid username or password.";}
                        } else { $login_err = "Invalid username or password.";}
                    } else { $login_err = "Invalid username or password.";}
                } else { echo "Unknown Error.";}
                mysqli_stmt_close($stmt);
            }
        }
        mysqli_close($link);
    }
}
?>