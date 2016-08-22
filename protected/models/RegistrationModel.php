<?php
    class RegistrationModel{

        public static function addUser($userdata, $usergroup = 0){
            $db = DBWorker::getInstance()->getConnection();
            $surname = $userdata['surname'];
            $name = $userdata['name'];
            $email = $userdata['email'];
            $password_hash = $userdata['password_hash'];
            $tel_number = $userdata['tel_number'];
            $stmt = $db->prepare("INSERT INTO `users` (surname, name, email, password_hash, tel_number, usergroup) VALUES (:surname, :name, :email, :password_hash, :tel_number, :usergroup)");
            return $stmt->execute(array(':surname'=>$surname, ':name'=>$name, ':email'=>$email, ':password_hash'=>$password_hash, ':tel_number'=>$tel_number, ':usergroup'=>$usergroup));
        }

        //Email используется как логин, поэтому не может быть двух разных пользователей с одним email'ом
        public static function checkExistenceOfEmail($email){
            $db = DBWorker::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT COUNT(email) as count_of_email FROM users WHERE email = :email");
            $stmt->execute(array(':email'=>$email));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result['count_of_email'] > 0){
                return true;
            }
            else{
                return false;
            }
        }

        
    }
?>