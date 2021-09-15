<?php 

    class crud{
        private $db;

        function __construct($conn){
            $this -> db = $conn;    
        }

        public function insertAttendies($fname, $lname, $dob, $speciality, $email, $phone){
            try{
                $sql = "INSERT INTO `attendence`(`attende_id`, `first_name`, `last_name`, `birth_date`, `speciality_value`, `email_address`, `phone_number`) VALUES (null, :fname, :lname, :dob, :speciality, :email, :phone)";
                $stmt = $this -> db -> prepare($sql);

                $stmt-> bindparam(':fname', $fname);
                $stmt-> bindparam(':lname', $lname);
                $stmt-> bindparam(':dob', $dob);
                $stmt-> bindparam(':speciality', $speciality);
                $stmt-> bindparam(':email', $email);
                $stmt-> bindparam(':phone', $phone);

                $stmt-> execute();
                return true;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        } 

        public function editAttendies($id, $fname, $lname, $dob, $speciality, $email, $phone){
            try{
                $sql = "UPDATE `attendence` SET `first_name`=:fname,`last_name`=:lname,`birth_date`=:dob,`speciality_value`=:speciality,`email_address`=:email,`phone_number`=:phone WHERE attende_id = :id";
                $stmt = $this -> db -> prepare($sql);

                $stmt-> bindparam(':id', $id);
                $stmt-> bindparam(':fname', $fname);
                $stmt-> bindparam(':lname', $lname);
                $stmt-> bindparam(':dob', $dob);
                $stmt-> bindparam(':speciality', $speciality);
                $stmt-> bindparam(':email', $email);
                $stmt-> bindparam(':phone', $phone);

                $stmt-> execute();
                return true;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }

        }

        public function getAttendies(){
            try{
                $sql = "SELECT * FROM `attendence` a inner join `specialities` s on a.speciality_value = s.specialities_id";
                $result = $this -> db -> query($sql);
                return $result;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function deleteAttendies($id){
            try{
                $sql = "DELETE FROM `attendence` WHERE attende_id = :id";
                $stmt = $this -> db -> prepare($sql);

                $stmt -> bindparam(':id', $id);
                $stmt -> execute();
                return true;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function getAttendeDetails($id){
            try{
                $sql = "SELECT * FROM `attendence` a inner join `specialities` s on a.speciality_value = s.specialities_id WHERE attende_id = :id";
                $stmt = $this -> db -> prepare($sql);

                $stmt -> bindparam(':id', $id);
                $stmt -> execute();
                $result = $stmt -> fetch();
                return $result;
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

        public function getSpecialities(){
            try{
                $sql = "SELECT * FROM `specialities`";
                $result = $this -> db -> query($sql);
                return $result;  
            }
            catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }  
        }

    }


?>