<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<?php if ($auth->is_admin): ?>
    <div class="modal-body row" id="wrap">
        <div class="col-md-8">
            <h3><?= __('Users') ?></h3><br>
            <table id="users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <td><?= __('#') ?></td>
                <td><?= __('Name') ?></td>
                <td><?= __('Email') ?></td>
                <td><?= __('Role') ?></td>
                </thead>
                <tbody>
                <?php $index = 1;
                foreach ($users as $user): ?>
                    <tr class='clickable-row' data-href="users/edit/<?= $user['user_id'] ?>">
                        <td><?= $index;
                            $index++; ?></td>
                        <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="add_user" class="pull-right col-md-4">

            <h3><?= __('Add new user') ?></h3><br>

            <form id="form" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('First name') ?></th>
                        <td><input class="form-control" type="text" name="data[first_name]" placeholder="Jaan"
                                   required/></td>
                    </tr>

                    <tr>
                        <th><?= __('Last name') ?></th>
                        <td><input class="form-control" type="text" name="data[last_name]" placeholder="Toor" required/>
                        </td>
                    </tr>

                    <tr>
                        <th><?= __('Role') ?></th>
                        <td>
                            <select class="form-control" name="data[role]">
                                <option><?= __('Operator') ?></option>
                                <option><?= __('Producer') ?></option>
                                <option><?= __('Sound man') ?></option>
                                <option><?= __('Admin') ?></option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><?= __('Password') ?></th>
                        <td><input class="form-control" type="password" name="data[password]" placeholder="******"
                                   required/></td>
                    </tr>

                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><input class="form-control" type="text" name="data[email]" placeholder="em@ail.ee" required>
                    </tr>
                </table>

                <button style="width: 100px; margin-top: -10px; margin-right: -50px;" class="btn btn-primary pull-right"
                        type="submit">
                    <?= __('Add') ?>
                </button>
                <br>
            </form>
        </div>
    </div>
<?php endif; ?>
<script>
    $(window).scroll(function () {
        $("#add_user").stop().animate({"marginTop": ($(window).scrollTop()) + "px"}, "slow");
    });

    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });

    $(document).ready(function () {
        $('#users_table').DataTable();
    });
</script>