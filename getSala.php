<?php
    include('db.php');
    
    $query = "SELECT * FROM sala";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row["codigo"]."' >".$row["codigo"]."</option>";
        }
    } else {
        echo "0 results";
    }
     

?>
