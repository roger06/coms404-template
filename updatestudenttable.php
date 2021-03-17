<?php 
/**
 * this isn't part of the site. it simply updates the student table with last names as this col didn't exist.
 */

// include the header file

 

require_once('header-inc.php'); 
 

 
$stmt = $db->prepare("SELECT * FROM test");
// $stmt->bindparam(":id", $id);
         
$stmt->execute();

// debugging - dont' delete this until final version
$stmt->debugDumpParams();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){


    echo $row['last_name'] . '<br>';

    $sql = "UPDATE student SET last_name = '".$row['last_name'] ."' WHERE ID = " . $row['ID'] ;

    $db->query($sql);
    echo $sql;

    echo '<br>';


}
 

 

?>
 
 