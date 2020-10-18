<?php

class Default_IndexController extends Zend_Controller_Action
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
    }
    public function statsAction()
    {
    
    }
    public function loginAction()
    {
    
    }
       public function adminAction()
    {
    
    }
        public function deleteAction()
    {
    
    }
        public function exportAction()
    {
        $this->_helper->layout()->disableLayout(); 
    }
        public function editAction()
    {
    
    }

}
