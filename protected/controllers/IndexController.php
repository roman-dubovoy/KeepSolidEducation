<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/protected/models/IndexModel.php';

    class IndexController{
        public function actionIndex(){
            $lastAdvertisements = IndexModel::getLastAdvertisements();

            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/header.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/index_view.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/footer.php';

            return true;
        }
    }
?>