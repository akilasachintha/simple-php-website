<?php require_once 'db/conn.php'; ?>

<?php 
    if(!isset($_GET['id'])){
        echo '<h1 class="text-danger">Please check detatis and try again</h1>';   
    }
    else{
        $id = $_GET['id'];
        $result = $crud -> deleteAttendies($id);  
        
        if ($result) {
            header("Location: viewrecords.php");
        } else {
            echo '<h1 class="text-center text-danger">There was an Error.</h1>';
        }
    }
?>