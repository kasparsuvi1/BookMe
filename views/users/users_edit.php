<?php if ($auth->is_admin): ?>
    <div class="row">
        <div class="col-md-6">
            <!-- User edit table start -->
            <h1><?= $user['first_name'] ?> <?= $user['last_name'] ?></h1>

            <form id="form" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('First name') ?></th>
                        <td><input class="form-control" type="text" name="data[first_name]"
                                   value=<?= $user['first_name'] ?> required/></td>
                    </tr>

                    <tr>
                        <th><?= __('Last name') ?></th>
                        <td><input class="form-control" type="text" name="data[last_name]"
                                   value=<?= $user['last_name'] ?> required/></td>
                    </tr>

                    <tr>
                        <th><?= __('Role') ?></th>
                        <td>
                            <select class="form-control" name="data[role]">
                                <option <?= $user['role'] == 'Operator' ? 'selected' : '' ?>><?= __('Operator') ?></option>
                                <option <?= $user['role'] == 'Producer' ? 'selected' : '' ?>><?= __('Producer') ?></option>
                                <option <?= $user['role'] == 'Sound man' ? 'selected' : '' ?>><?= __('Sound man') ?></option>
                                <option <?= $user['role'] == 'Admin' ? 'selected' : '' ?>><?= __('Admin') ?></option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><?= __('Password') ?></th>
                        <td><input class="form-control" type="password" name="data[password]" required/></td>
                    </tr>

                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><input class="form-control" type="text" name="data[email]"
                                   value=<?= $user['email'] ?> required>
                    </tr>
                </table>
            </form>
            <!-- User edit table end -->


            <!-- BUTTONS -->

            <div class="pull-right">

                <!-- CANCEL -->
                <button class="btn btn-default" onclick="window.location.href = 'users/view/<?= $user['user_id'] ?>'">
                    Cancel
                </button>

                <!-- DELETE -->

                <button class="btn btn-danger" onclick="delete_user(<?= $user['user_id'] ?>)">
                    Delete
                </button>

                <!-- SAVE -->
                <button class="btn btn-primary" onclick="$('#form').submit()">
                    Save
                </button>

            </div>

            <!-- END BUTTONS -->
        </div>
    </div>
<?php endif; ?>

<script>

    //Delete user via AJAX
    function delete_user(user_id) {
        $.post("users/delete", {user_id: <?=$user['user_id']?>}, function (data) {
            if (data == '1') {
                window.location.href = 'users';
            } else {
                alert('Fail');
            }
        });
    }

</script>
