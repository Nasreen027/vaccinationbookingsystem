<!-- function on approve btn  to set parent status = approved 
     [start]
-->
<?php

function approveParentStatus(){
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
?>
<!-- function on approve btn  to set parent status = approved 
     [end]
-->