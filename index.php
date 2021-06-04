<?php
require_once "app/cors.php";
require_once "app/sentences.php";
if ($_GET) {
    $data = '';
    $option = $_GET['option'];
    switch ($option) {
        case 'GET':
            $data = Sentences::__listData();
            break;
        case 'POST':
            $arrayName = array(
                'names' => $_POST['names'],
                'dni' => $_POST['dni']
            );
            if (Sentences::__validationsData($_POST['dni'])) {
                $data = 'Data already exists in the base';
            } else {
                $data = Sentences::__saveData($arrayName);
            }
            break;
        case 'PUT':
            $arrayName = array(
                'names' => $_POST['names'],
                'dni' => $_POST['dni'],
                'id' => $_POST['id']
            );
            $data = Sentences::__updateData($arrayName);
            break;
        case 'DELETE':
            $id = $_POST['id'];
            $data = Sentences::__deleteData($id);
            break;
        default:
            # code...
            break;
    }
    print_r(json_encode(($data)));
}
