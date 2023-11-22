
<!DOCTYPE html>
<html>
<head>
    <style>
         body{background: #1abc9c;
    
}
        h2 {
            text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
        }
        p{
            text-align: center;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
        }
        </style>
    
</head>
<body>
    <h2>Registration Successful</h2>
    <p>Thank you for registering!</p>
    <script>
    setTimeout(function() {
      window.location.href = "register.php";
    }, 2000); 
  </script>
<?php
// Connect to the database
$host = "localhost";
$db = "id20970175_mihir";
$user = "id20970175_mihir_111";
$password = "Mj123@786";

$conn = new mysqli($host, $user, $password, $db);
 if ($conn->connect_error) {
     print("Connection ") ;
 }else{
   print("Connection successfully") ;
 }
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$level="pool 1";


$checkSql = "SELECT * FROM members WHERE name='$name'";
$checkResult = $conn->query($checkSql);
if ($checkResult !== false && $checkResult->num_rows > 0){
    // Username already exists
    echo "name already taken. Please choose a different name.";
} else {
    // Insert the new user into the database
    $insertSql = "INSERT INTO members (`name`, `email`, `password`, `level`) VALUES ('$name', '$email', '$pass', '$level')";

    if ($conn->query($insertSql) === TRUE) {
        // Check the number of registered users
        $registeredUsersSql = "SELECT COUNT(*) AS total FROM members";
        $registeredUsersResult = $conn->query($registeredUsersSql);
        $row = $registeredUsersResult->fetch_assoc();
        $registeredUsers = $row['total'];
        
       
        if ($registeredUsers == 3) {
            // Update the first user's points to 14 in the database
            $updateSql = "UPDATE members SET points = 14, level = 'Pool 2' WHERE id = 1";

            $conn->query($updateSql);
        }
        if ($registeredUsers == 6) {
           
            $updateSql = "UPDATE members SET points = points + 8, level = 'Pool 2' WHERE id = 2";
            $result = mysqli_query($conn, $updateSql);
        }
        if ($registeredUsers == 9) {
            
            $updateSql = "UPDATE members SET points = points + 8, level = 'Pool 2' WHERE id = 3";
            $result = mysqli_query($conn, $updateSql);
        }
    }
   
}


?>
</body>
</html>