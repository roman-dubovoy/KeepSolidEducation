<?php
    class DBWorker{
        private static $instance = null;
        private $connection = null;

        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new DBWorker();
            }
            return self::$instance;
        }

        public function getConnection(){
            try {
                if (is_null($this->connection)) {
                    $this->connection = new PDO('mysql:host=localhost;dbname=advboard', 'root', '');
                }
                return $this->connection;
            }catch (PDOException $e) {
                echo 'Connection to database is failed: ' . $e->getMessage();
            }
        }

        /*public function getUserPasswordHash($id){
            $stmt = $this->connection->prepare("SELECT password_hash FROM `users` WHERE id = :id");
            $stmt->execute(array(':id' => $id));
            return $stmt->fetch();
        }

        public function getUserInfo($id){
            $stmt = $this->connection->prepare("SELECT surname, name, email, tel_number, usergroup FROM `users` WHERE id = :id");
            $stmt->execute(array(':id'=>$id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addUser($userdata, $usergroup = 0){
            $surname = $userdata['surname'];
            $name = $userdata['name'];
            $email = $userdata['email'];
            $password_hash = $userdata['password_hash'];
            $tel_number = $userdata['tel_number'];
            $stmt = $this->connection->prepare("INSERT INTO `users` (surname, name, email, password_hash, tel_number, usergroup) VALUES (:surname, :name, :email, :password_hash, :tel_number, :usergroup)");
            $stmt->execute(array(':surname'=>$surname, ':name'=>$name, ':email'=>$email, ':password_hash'=>$password_hash, ':tel_number'=>$tel_number, ':usergroup'=>$usergroup));
        }*/
    }
?>