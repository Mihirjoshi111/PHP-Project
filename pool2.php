
<!DOCTYPE html>
<html>
<head>
   <style>
     body{background: #1abc9c;
    
    }
    .ab{
        color:#eb8334;
        font-weight: bold;
        font-size:150%;

    }
    button{
        background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
 
    }
   </style> 
   
</head>
<body >
<button onclick="location.href='register.php'" class="link-button">Go to back</button>

<?php
$host = "localhost";
$db = "id20970175_mihir";
$user = "id20970175_mihir_111";
$password = "Mj123@786";

$conn = new mysqli($host, $user, $password, $db);

$sql = "SELECT * FROM members WHERE level = 'Pool 2'";
$result = mysqli_query($conn, $sql);

echo "<h2>Members in Pool 2</h2>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Level</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='ab'>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['level'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>