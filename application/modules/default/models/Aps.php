<?php
	class Default_Model_Aps
	{
		
	     // ----------------------------Server Prod ----------------------------------
		function InitDb() 
		{
			$options = array(
					Zend_Db::ALLOW_SERIALIZATION => false
			);

			$params = array(
					'host'           => 'localhost',
					'username'       => 'optimas',
					'password'       => 'optima123',
					'dbname'         => 'OPTIMA_VA',
					 'port'		    => '33306',
					'options'        => $options
			);

			$db = Zend_Db::factory('Pdo_Mysql', $params);
			return $db;
		}
		
	}
