<?php
    require $_SERVER['DOCUMENT_ROOT'].'/protected/models/RegistrationModel.php';

    class RegistrationController{
        function actionIndex(){
            if(isset($_POST['registry'])){
                if (!empty($_POST['surname']) && !empty($_POST['name'])
                    && !empty($_POST['email']) && !empty($_POST['password'])){

                    if (!RegistrationModel::checkExistenceOfEmail(strip_tags($_POST['email']))){
                        $_SESSION['surname'] = strip_tags($_POST['surname']);
                        $_SESSION['name'] = strip_tags($_POST['name']);
                        $_SESSION['tel_number'] = strip_tags($_POST['tel_number']);
                        $_SESSION['email'] = strip_tags($_POST['email']);
                        $_SESSION['email_exists'] = false;
                        $_SESSION['password_hash'] = md5(md5(strip_tags($_POST['password'])));

                        $isSucessful = RegistrationModel::addUser($_SESSION);
                        if ($isSucessful){
                            $email_parts = explode('@', $_SESSION['email']);
                            $nickname = $email_parts[0];
                            $_SESSION['nickname'] = $nickname;
                            $_SESSION['is_registration_successful'] = $isSucessful;
                            header('Location: /authorization');
                        }
                    }
                    else{
                        $_SESSION['email_exists'] = true;
                    }
                }
            }

            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/header.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/registration_view.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/footer.php';
        }
    }
?>