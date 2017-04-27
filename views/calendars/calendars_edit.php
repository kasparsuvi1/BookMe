<?php if (!$auth->is_admin): ?>
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert">×</button>
        You are not an administrator.
    </div>
    <?php exit(); endif; ?>
<h1>Calendar '<?= $calendar['calendar_name'] ?>'</h1>
<form id="form" method="post">
    <table class="table table-bordered">
        <tr>
            <th><?= __('Calendar name') ?></th>
            <td><input type="text" name="data[calendar_name]" value="<?= $calendar['calendar_name'] ?>"/></td>
        </tr>
    </table>
</form>

<!-- BUTTONS -->
<div class="pull-right">

    <!-- CANCEL -->
    <button class="btn btn-default"
            onclick="window.location.href = 'calendars/view/<?= $calendar['calendar_id'] ?>/<?= $calendar['calendarname'] ?>'">
        <?= __("Cancel") ?>
    </button>

    <!-- DELETE -->
    <button class="btn btn-danger" onclick="delete_calendar(<?= $calendar['calendar_id'] ?>)">
        <?= __("Delete") ?>
    </button>

    <!-- SAVE -->
    <button class="btn btn-primary" onclick="$('#form').submit()">
        <?= __("Save") ?>
    </button>

</div>
<!-- END BUTTONS -->

<!-- JAVASCRIPT
==============================================================================-->
<script type="application/javascript">
    function delete_calendar() {
        $.post('<?=BASE_URL?>calendars/delete', {calendar_id: <?= $calendar['calendar_id'] ?>}, function (response) {
            if (response == 'Ok') {
                window.location.href = '<?=BASE_URL?>calendars';
            }
        })
    }
</script>