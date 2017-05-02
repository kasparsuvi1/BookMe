<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" href="assets/Multiple-Dates-Picker/jquery-ui.multidatespicker.css"/>

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="assets/Multiple-Dates-Picker/jquery-ui.multidatespicker.js"></script>
<script src="assets/tablesorter/jquery.tablesorter.js"></script>

<div id="wrapper">
    <h3><?= __('Choose your parameters:') ?></h3>
    <hr>
    <form method="post" class="form-inline">
        <div class="col-md-3" id="search">
            <div id="datepicker"></div>

            <br>
            <label for="role">Role</label>
            <select id="role" class="form-control" name="data[role]">
                <option><?= __('Operator') ?></option>
                <option><?= __('Sound man') ?></option>
                <option><?= __('All') ?></option>
            </select>

            <button class="btn btn-success" onclick="search_matches()"><?= __('Search') ?></button>
        </div>

    </form>
    <div id="table_users" class="col-md-9">
        <table id="table123" class="table table-hover table-bordered">
            <thead>
            <tr>
                <td><?= __('Name') ?></td>
                <td><?= __('Role') ?></td>
                <td><?= __('Aadress') ?></td>
                <td><?= __('Working experience') ?></td>
                <td><?= __('Phone') ?></td>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function () {
            $("#table123").tablesorter();
        }
    );


    //    $(document).ready(function () {
    //        $('#table').DataTable();
    //    });

    $(function () {
        $("#datepicker").multiDatesPicker({
            minDate: 0, // today
            maxPicks: 10,
            firstDay: 1
        });
    });

    $(window).scroll(function () {
        $("#search").stop().animate({"marginTop": ($(window).scrollTop()) + "px"}, "slow");
    });

    function search_matches() {
        $("#table_users tbody").empty();
        var role_select = document.getElementById("role");
        var selected_role = role_select.options[role_select.selectedIndex].text;

        $.post("booking/search_matches", {
            'dates[]': $("#datepicker").multiDatesPicker("getDates"),
            role: selected_role
        }, function (data) {

            var data = JSON.parse(data);
            $.each(data, function (key, index) {
                $('#table_users tbody').append('' +
                    '<tr>' +
                    '<td>' + data[key].first_name + ' ' + data[key].last_name + '</td>' +
                    '<td>' + data[key].role + '</td>' +
                    '<td>' + data[key].aadress + '</td>' +
                    '<td>' + data[key].working_experience + '</td>' +
                    '<td>' + data[key].phone_number + '</td>' +
                    '</tr>')
                //$('#table_users tr:last').after('<tr><td>',i.user_id,'</td></tr>');
            })
        });
        event.preventDefault();
    }

</script>
