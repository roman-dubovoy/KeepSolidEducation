<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/protected/models/CategoriesModel.php';
    class CategoriesController{
        public function actionIndex(){
            $categoriesList = CategoriesModel::getCategoriesList();
            
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/header.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/categories_view.php';
            include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/footer.php';

            return true;
        }

        public function actionView($id_category){
            $advertisementsOfCategory = CategoriesModel::getAdvertisementsByCategoryId($id_category);
            print_r($advertisementsOfCategory);
            return true;
        }
    }
?>