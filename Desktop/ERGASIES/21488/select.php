<html>
<body>
<?php

    $servername = "127.0.0.1:49883";
    $username = "azure";
    $password = "6#vWHD_$";
    $database = "localdb";

// Create connection
    $con = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    $jsondata = file_get_contents('php://input');
// Decode the json
    $data = json_decode($jsondata,true);
    $search = $data['search'];
    $sql = "SELECT * FROM books WHERE (author LIKE '%$search%' OR title LIKE '%$search%' OR genre LIKE '%$search%' OR price LIKE '%$search%') ";
    $result = mysqli_query($con,$sql);
   
//Print the resuts
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo "<strong><div align='center'> Author: ". $row["author"].  " ,  Title: ". $row["title"].  " ,   Genre: ". $row["genre"].  " ,   Price: ". $row["price"].  "</div></strong><br>";
        }
    } else {
        echo "<strong><div align='center'>There is no result with this keyword</div></strong>";
    }
    
    mysqli_close($con);

?>
</body>
</html>