<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: mainpage.php");
    exit;
}
?>

<div class="container">
       <div class="row d_flex">
            <p>Username</p>
                <form>
                    <input type="text" placeholder="Username" id="username" required>
                    <input type="password" placeholder="Password" id="password" required>
                    <button ng-click="login()">Submit</button>
                </form>
        </div>
</div>