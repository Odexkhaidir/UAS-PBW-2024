<?php
use App\Models\AuthModel;

function allow($level) {
    $session = \Config\Services::session();
    $user = $session->get('username');
    $table = 'user';
    $model = new AuthModel();
    $row = $model->get_data_login($user, $table);

    if($row != null) {
        if($row->level == $level) {
            return true;
        } else {
            return false;
        }
    }
}