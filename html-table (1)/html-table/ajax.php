<?php
    require_once 'database.php';

    if(isset($_POST['action']) && $_POST['action'] == 'change'){
        update_data($_POST['fromRow'], $_POST['fromCol'], $_POST['fromText'], $_POST['toRow'], $_POST['toCol'], $_POST['toText'],$conn );
    }
    function update_data($fromRow, $fromCol, $fromText, $toRow, $toCol, $toText, $conn){
        $query="UPDATE `table_data` SET `".$fromCol."`='".$toText."' WHERE `id`=".$fromRow;
        $exec= mysqli_query($conn,$query);
        $query2="UPDATE `table_data` SET `".$toCol."`='".$fromText."' WHERE `id`=".$toRow;
        $exec2= mysqli_query($conn,$query2);
        if($exec && $exec2){
            $output = json_encode(array('status' => 1,));      
            die($output);
        }else{
            $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
            $output = json_encode(array('status' => 0,'text' => $msg));  
            die($output);
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == 'update-cell-data')
    {
        $query="UPDATE `table_data` SET `".$_POST['col']."`='".$_POST['data']."' WHERE `id`=".$_POST['id'];
        $exec= mysqli_query($conn,$query);
        if($exec){
            $output = json_encode(array('status' => 1,));      
            die($output);
        }else{
            $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
            $output = json_encode(array('status' => 0,'text' => $msg));  
            die($output);
        }
    }
?>