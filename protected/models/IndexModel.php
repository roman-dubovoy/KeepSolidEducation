<?php
    class IndexModel{

        public static function getLastAdvertisements(){
            $db = DBWorker::getInstance()->getConnection();
            $stmt = $db->prepare('SELECT advertisements.id, title, advertisements.description, creation_datetime, adv_categories.name, users.name, users.email, users.tel_number
                                  FROM advertisements
                                  INNER JOIN adv_categories
                                  INNER JOIN users
                                  ON advertisements.id_category = adv_categories.id AND advertisements.id_user = users.id
                                  ORDER BY creation_datetime DESC
                                  LIMIT 12');
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);;
        }
    }
?>