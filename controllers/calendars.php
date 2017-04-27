<?php namespace Halo;

class calendars extends Controller
{

    function index()
    {
        $this->calendars = get_all("SELECT * FROM calendars");
    }

    function view()
    {
        //Get user_id
        $this->user_id = $this->params[0];

        //Saan kasutaja varem valitud vabad päevad
        $this->dates = get_first("SELECT rest_days FROM rest_days WHERE user_id = '{$this->user_id}'");


        //kui kasutajal on juba varem valitud vabad päevad
        if (!empty($this->dates)) {
            $this->dates = explode(",", $this->dates['rest_days']);
            $this->dates = json_encode($this->dates);
        } else {
            //kui ei ole, siis hardcode'ga lisame ühe, et saaks uusi valida(hiljem eemaldatakse)
            $this->dates = [];
            array_push($this->dates, '04/01/1999');
            $this->dates = json_encode($this->dates);
        }

        //Kasutaja andmed
        $this->user = get_first("SELECT * FROM users WHERE user_id = '{$this->user_id}'");
    }

    function ajax_save()
    {
        //Kui valitud on üle 2 päeva eemaldan hardcoded valitud päeva.
        //Hardcoded päev lisatud selleks, et ilma varem valitud päevadeta userid saaksid päevi valida.
        if (count($_POST['dates']) > 1) {
            $dates = array_diff($_POST['dates'], ["04/01/1999"]);
        } else {
            $dates = $_POST['dates'];
        }
        //Tekita array string, mis läheb database
        $dates = implode(",", $dates);
        $user_id = $_POST['user_id'];

        //Sisesta tabelisse rest_days, sama user_id väljad kirjutatakse üle.
        $data = array('user_id' => $user_id, 'rest_days' => $dates);
        insert('rest_days', $data);
    }


}