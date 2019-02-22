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
//Decode the json 
    $data = json_decode($jsondata,true);

    $author = $data['author'];
    $title = $data['title'];
    $genre = $data['genre'];
    $price = $data['price'];


    
    $sql = "INSERT INTO books (author,title,genre,price)  VALUES ('$author','$title','$genre','$price')";

//Execute the sql query	
    
    if ($con->query($sql)) {
        echo "<strong><div align='center'>New record created successfully</div><strong>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
  

?>
</body>
</html>