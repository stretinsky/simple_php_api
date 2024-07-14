<?php // [Менеджер] Создание новой вакансии

header('Content-Type: application/json; charset=utf-8');

require 'root_classes.php';

class ActionRequest extends MainRequestClass {
    public $action;
}
$inputAction = new ActionRequest();
$inputAction->from_json(file_get_contents('php://input'));


class DzDeleteDz extends MainRequestClass {
    public $ht_number;
}


class DzDeleteDzResponse extends MainResponseClass {
    public $success = false;
}

class ChangeDz extends MainRequestClass {
    public $ht_number;
}


class ChangeDzResponse extends MainResponseClass {
    public $success = false;
}

switch ($inputAction->action) {
    case 'delete':
        $in = new DzDeleteDz();
        $in->from_json(file_get_contents('php://input'));

        if ($_SESSION['user_type'] != 'Админ')
        {
            exit();
        }

        $ht_number=$in->ht_number;

        $query="DELETE FROM `home_tasks` WHERE `ht_number`='".$ht_number."';";
        $result = mysqli_query($link, $query);

        if ($result === false) {
            $out->make_wrong_resp();
        }

        $query="DELETE FROM `cross_check` WHERE `ht_num`='".$ht_number."';";
        mysqli_query($link, $query) or die();
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);		
        mysqli_close($link);

        $out = new DzDeleteDzResponse();
        
        $out->success = true;
        break;
    case 'change':
        $in = new ChangeDz();
        $in->from_json(file_get_contents('php://input'));
        $out = new ChangeDzResponse();
        
        $out->success = true;
        break;

}

// класс запрос

// класс ответа

$out->make_resp('');
