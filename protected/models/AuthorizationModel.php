<?php
    class AuthorizationModel{
        
        public static function checkEmail($email){
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
        
        public static function checkPassword($email, $password){
            $db = DBWorker::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT password_hash FROM users WHERE email=:email");
            $stmt->execute(array(':email'=>$email));
            $received_hash = $stmt->fetch(PDO::FETCH_ASSOC);
            $typed_password_hash = md5(md5($password));
            if ($typed_password_hash === $received_hash['password_hash']){
                return true;
            }
            else{
                return false;
            }
        }
        
    }
?>