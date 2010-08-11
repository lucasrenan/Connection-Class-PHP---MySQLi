<?php
require_once "../Connection.class.php";

try {
    $Connection = Connection::getInstance();

    $sql = "SELECT * FROM table";
    $result = $Connection->query($sql);

    echo "Total: {$result->num_rows} <br /><br />";
    
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo $row["field"]."<br />";
    }

    $Connection->close();
}
catch (Exception $e) {

    echo $e->getMessage();
}

?>