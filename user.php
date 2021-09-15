<?php 
    class user{
        private $db;

        function __construct($conn){
            $this -> db = $conn;    
        }

        public function insertUser($username, $password){
            try{
                $result = $this -> getUserByUsername($username); 

                if($result['num'] > 0){
                    return false;
                }
                else{
                    $newPassword = md5($password.$username);
                    $sql = "INSERT INTO `user`(`user_name`, `password`) VALUES(:username, :password)";
                    $stmt = $this -> db -> prepare($sql);

                    $stmt-> bindparam(':username', $username);
                    $stmt-> bindparam(':password', $newPassword);
        
                    $stmt-> execute();
                    return true;
                }
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM `user` WHERE `user_name` = :username AND `password` = :password";
                $stmt = $this -> db -> prepare($sql);

                $stmt-> bindparam(':username', $username);
                $stmt-> bindparam(':password', $password);
        
                $stmt-> execute();
                $result = $stmt -> fetch();
                return $result;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function getUserByUsername($username){
            try{
                $sql = "SELECT count(*) as num FROM `user` WHERE `user_name` = :username";
                $stmt = $this -> db -> prepare($sql);

                $stmt-> bindparam(':username', $username);
        
                $stmt-> execute();
                $result = $stmt -> fetch();
                return $result;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }
    }
