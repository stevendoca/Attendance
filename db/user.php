<?php
    class user {
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function insertUser($userName, $password){
            try{
                //validate where entered user name was already existed
                $result = $this->getUserbyUserName($userName);
                
                if($result['num'] >0){
                    return false;
                }else {
                $new_password = md5($password.$userName);
                //define SQL statement to be executed
                $sql = "INSERT INTO users (userName, password) VALUES (:userName,:password)";

                //prepare the SQL statement for execution
                $statement = $this->db->prepare($sql);

                // bind all placeholders to actual values;
                $statement->bindparam(':userName',$userName);
                $statement ->bindparam(':password',$new_password);

                //execute statement
                $statement->execute();
                return true;
                }
            }catch(PDOException $e){    
                echo $e->getMessage();
                return false;
            }

        }

        public function getUser($userName, $password){
            try {

                //define SQL statement to be executed
                $sql = "SELECT * FROM `users`u WHERE u.userName = :userName AND u.password =  :password";

                //prepare statement to be executed;
                $statement = $this->db->prepare($sql);

                //bind all placeholder to actual values
                $statement->bindparam(':userName', $userName);
                $statement->bindparam(':password', $password);

                //execute statement
                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserbyUserName($userName){
            try{
                //define SQL statement to be executed
                $sql = "SELECT count(*) as num from users WHERE userName = :userName";

                //prepare statement to be executed;
                $statement = $this->db->prepare($sql);

                //bind all placeholder to actual values
                $statement->bindparam(':userName', $userName);

                //execute statement
                $statement->execute();
                $result = $statement->fetch();
                return $result;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>