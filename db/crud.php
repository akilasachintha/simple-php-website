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

        public function getAttendies(){
            $sql = "SELECT * FROM `attendence` a inner join `specialities` s on a.speciality_value = s.specialities_id";
            $result = $this -> db -> query($sql);
            return $result;
        }

        public function getSpecialities(){
            $sql = "SELECT * FROM `specialities`";
            $result = $this -> db -> query($sql);
            return $result;    
        }

    }


?>