<?php 

	class Registration extends DB {
		public function __construct() {
			$dbConfig = array(
					'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
		            'DB_USER' => 'root',
		            'DB_PASSWORD' => '');
			parent::__construct($dbConfig);
		}

		public function signUp($email, $password) {
				$db = $this->getDb();
		        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");

		        	$binds = array(
		        			":email" => $email,
		        			":password" => password_hash($password, PASSWORD_DEFAULT)
		        		);
		        
		        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		          	return true;
		        }
		        
		        return false;
		    }

		public function login($email, $password) {
			$db = $this->getDb();
		        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");

		        	$binds = array(
		        			":email" => $email,
		        	);
		        
		        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		          	$results = $stmt->fetch(PDO::FETCH_ASSOC);
		          	if (password_verify($password, $results['password'])) {
		          		return intval($results['user_id']);
		          	}
		        }
		        
		        return 0;
		    }
		public function isLoggedIn() {
			return (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0);


		}

		public function getEmail($user_id) {
	        $db = $this->getDB();
	        $stmt = $db->prepare("SELECT email FROM users WHERE user_id = :user_id");
	        $binds = array(
	        	":user_id" => $user_id
	        	);
	        $results = array();
	        if ($stmt->execute($binds) && $stmt->rowcount() > 0) {
	            $results = $stmt->fetch(PDO::FETCH_ASSOC);
	            return $results['email'];
	        }
	        return "";
    	}
	}
		
?>