<?php include('connInfo.php');
mysqli_report(MYSQLI_REPORT_ALL);
$conn = connect();

$sql = "SELECT UNAME, UPASSWORD FROM USERS WHERE LOGIN_ID = ?";
$username = $_POST["username"];
$password = $_POST["password"];
$arr = array();

if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_bind_param($stmt, "s", $param_username);
  $param_username = $username;
      
  if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
          
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $name, $hashed_password);

        if (mysqli_stmt_fetch($stmt)) {
          if ($password == $hashed_password) {
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["name"] = $name;
              $_SESSION["username"] = $username;
              array_push($arr, 1);
              echo json_encode($arr);

          } else { 
              $login_err = "Invalid password";
          }
        } else { 
            $login_err = "Invalid username or password";
        }
      }
  }
  mysqli_stmt_close($stmt); 
}

if (!$arr){
  array_push($arr, 0);
  echo json_encode($arr);
}

mysqli_close($conn);
?>
