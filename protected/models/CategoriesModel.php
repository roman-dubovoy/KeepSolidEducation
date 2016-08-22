<?php
    class CategoriesModel{
        public static function getCategoriesList(){
            $db = DBWorker::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT id, name FROM adv_categories');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getAdvertisementsByCategoryId($id_category){
            $db = DBWorker::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT * FROM advertisements
                                  WHERE id_category=:id_category
                                  ORDER BY creation_datetime DESC');
            $stmt->execute(array(':id_category'=>$id_category));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>