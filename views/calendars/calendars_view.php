<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" href="assets/Multiple-Dates-Picker/jquery-ui.multidatespicker.css"/>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="assets/Multiple-Dates-Picker/jquery-ui.multidatespicker.js"></script>
<?php if ($this->user_id == $auth->user_id): ?>

    <div id="datepicker"></div>
    <button id="save" class="btn btn-default" onclick="Save()">Save</button>

    <script>
        $(function () {
            var dates = <?= $dates ?>;
            console.log(dates);
            $("#datepicker").multiDatesPicker({
                minDate: 0, // today
                numberOfMonths: [1, 3],
                firstDay: 1,
                addDates: dates,

                onSelect: function () {
                    $("#save").text("Save").removeClass("btn-success").addClass("btn-default");
                }
            });
        });

        function Save() {
            $.post("calendars/save", {
                'dates[]': $("#datepicker").multiDatesPicker("getDates"),
                user_id: <?= $user['user_id'] ?>}, function (data) {
                if (data == '1') {
                    alert(data);
                } else {
                    console.log(data);
                }
            });
            $("#save").text("Saved").addClass("btn-success");

        }
    </script>
<?php else: ?>
    <div class="alert">
        <p><?= __('Why u are trying to change someone else data? Admin look here, a possible threat!') ?></p>
    </div>
<?php endif; ?>