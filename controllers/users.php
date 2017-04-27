<?php namespace Halo;


class users extends Controller
{
    public $requires_auth = true;

    function index()
    {
        $this->users = get_all("SELECT * FROM users WHERE deleted=0");

    }

    function post_index()
    {
        $data = $_POST['data'];
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($data['role'] == 'Admin') {
            $data['is_admin'] = 1;
        }

        insert('users', $data);


    }


    function view()
    {
        $user_id = $this->params[0];
        $this->user = get_first("SELECT * FROM users WHERE user_id = {$user_id}");
    }

    function ajax_add_user()
    {
        $data = $_POST;
        $user_id = $data['user_id'];
        unset($data['user_id']);
        insert('users', $data, "user_id = {$user_id}");

        exit("ok");
    }


    function edit()
    {
        $user_id = $this->params[0];
        $this->user = get_first("SELECT * FROM users WHERE user_id = {$user_id}");
    }

    function post_delete()
    {
        $user_id = $_POST['user_id'];
        update('users', ['deleted' => '1'], "user_id = '$user_id'");
        exit("1");
    }

    function post_edit()
    {
        $data = $_POST['data'];
        echo $data;
        $data['user_id'] = $this->params[0];

        //kui parooli pole setitud, siis ei muuda
        if ($data['password'] !== "") {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        //kontroll, kas role on admin, kui jah, siis is_admin = 1
        if ($data['role'] == 'Admin') {
            $data['is_admin'] = 1;
        }

        insert('users', $data);
        header('Location: ' . BASE_URL . 'users/');
    }

} 