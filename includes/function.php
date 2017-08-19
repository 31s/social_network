<?php

if(!function_exists('not_empty')) {
    function not_empty($fields = []) {
            if(count($fields) != 0) {
                foreach($fields as $field) {
                    if(empty($_POST[$field]) || trim($_POST[$field]) == "") {
                        return false;
                    }
                }
                    return true;
            }
    }
}


if(!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table) {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);

        $count = $q->rowcount();

        $q->closeCurser();

        return $count;
    }
}
