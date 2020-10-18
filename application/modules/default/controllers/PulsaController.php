<?php

class Default_PulsaController extends Zend_Controller_Action
{

    public function init()
    {
     $databaseHost = 'localhost';
    $databaseName = 'data';
    $databaseUsername = 'root';
    $databasePassword = '';
    
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
       

    }

    public function indexAction()
    {
        // action body
    }
 
    
    
    
    public function beliAction()
    {
              
    
        
    }
    public function konfirmasiAction()
    {

         


    
    }
    public function gagalAction()
    {
    
        $databaseHost = 'localhost';
        $databaseName = 'data';
        $databaseUsername = 'root';
        $databasePassword = '';
        
        $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
        
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $result = mysqli_query($mysqli,"SELECT 'id' FROM pancing");
        $idd = mysqli_num_rows($result) - 1;
        
        $sql = mysqli_query($mysqli,"DELETE FROM pancing WHERE id='$idd'");
        
        if ($mysqli->query("DELETE * FROM pancing WHERE id='$idd'") === TRUE) {
        
        } else {
            mysqli_close($mysqli);
             
        }
    $r = new Zend_Controller_Action_Helper_Redirector;
    $r->gotoUrl('/../')->redirectAndExit();

        
    }
    

}

