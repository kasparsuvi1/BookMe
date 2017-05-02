<?php namespace Halo;

class booking extends Controller
{

    function index()
    {
        $this->users = get_all("SELECT * FROM users LEFT JOIN rest_days USING (user_id)");
    }

    function ajax_search_matches()
    {
        $dates = $_POST['dates'];
        $role = $_POST['role'];


        //if user chooses role "All" show all users roles
        if ($role !== 'All') {
            $where = "WHERE role='{$role}'";
        } else {
            $where = "WHERE role='Admin' OR role='Operator' OR role='Sound man'";
        }

        //Get all users who are this role
        $this->users_who_work = get_all("SELECT * FROM users
                                              LEFT JOIN rest_days USING (user_id)
                                                        {$where}");

        $available_users_id = [];
        //search all users and control if they are free or not
        foreach ($this->users_who_work as $user) {
            $user['free'] = 1;
            foreach ($dates as $date) {
                //if they are not free
                if (strpos($user['rest_days'], $date) !== false) {
                    $user['free'] = 0;
                } elseif ($user['free'] != 0) {
                    $user['free'] = 1;
                }
            }
            //Can see if it work correctly
            if ($user['free'] == 1) {
                array_push($available_users_id, $user['user_id']);
            }
        }

        $available_users_id = join("','", $available_users_id);
        $this->users_free = get_all("SELECT * FROM users WHERE user_id IN ('{$available_users_id}') AND deleted=0");
        echo json_encode($this->users_free);
    }

}