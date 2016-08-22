<?php
    include $_SERVER['DOCUMENT_ROOT'].'/protected/models/AuthorizationModel.php';
    class AuthorizationController{

        function actionIndex(){
            if (isset($_POST['submit'])){
                if (!empty($_POST['email'])){
                    $email_exists = AuthorizationModel::checkEmail(strip_tags($_POST['email']));
                    if ($email_exists){
                        $success = AuthorizationModel::checkPassword(strip_tags($_POST['email']), $_POST['password']);
                        if ($success){
                            $_COOKIE['pswd_clear'] = $success;
                            $email_parts = explode('@', strip_tags($_POST['email']));
                            $_SESSION['nickname'] = $email_parts[0];
                        }
                        else{
                            $_COOKIE['pswd_clear'] = !$success;
                        }
                    }
                    else{
                        $_COOKIE['pswd_clear'] = !$success;
                    }
                }
            }


            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/header.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/authorization_view.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/footer.php';
        }
    }
?>