<?php if ($auth->is_admin OR $auth->user_id == $params[0]): ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User profile form requirement</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
          crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

        .othertop {
            margin-top: 10px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal" method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend><?= __('Profile') ?></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="first_name"><?= __('First name') ?></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="first_name" name="first_name" type="text" value="<?= $user['first_name'] ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>
                    <input id="user_id" name="user_id" type="hidden" value="<?= $user['user_id'] ?>">

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="last_name"><?= __('Last name') ?></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="last_name" name="last_name" type="text" value="<?= $user['last_name'] ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gender">Gender</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="gender-0">
                                <input type="radio" name="gender" id="gender-0"
                                       value="1" <?= $user['gender'] == 1 ? "checked" : "" ?> >
                                Male
                            </label>
                            <label class="radio-inline" for="gender-1">
                                <input type="radio" name="gender" id="gender-1"
                                       value="2" <?= $user['gender'] == 2 ? "checked" : "" ?>>
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label for=" aadress">Address</label>
                        <div class="col-md-4">
                            <input id="aadress" name="aadress" type="text" placeholder="Address"
                                   class="form-control input-md" value="<?= $user['aadress'] ?>">
                        </div>

                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="occupation">Primary Occupation</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>

                                </div>
                                <input id="occupation" name="occupation" type="text" placeholder="Primary Occupation"
                                       class="form-control input-md" value="<?= $user['occupation'] ?>">
                            </div>


                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="skills">Skills</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-graduation-cap"></i>

                                </div>
                                <input id="skills" name="skills" type="text" placeholder="Skills"
                                       class="form-control input-md" value="<?= $user['skills'] ?>">
                            </div>


                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone_number">Phone number </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-mobile fa-1x" style="font-size: 20px;"></i>

                                </div>
                                <input id="phone_number" name="phone_number" type="text"
                                       placeholder="Primary Phone number " class="form-control input-md"
                                       value="<?= $user['phone_number'] ?>">

                            </div>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email Address</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>

                                </div>
                                <input id="email" name="email" type="text" placeholder="Email Address"
                                       class="form-control input-md" value="<?= $user['email'] ?>">

                            </div>

                        </div>
                    </div>


                    <!-- Multiple Radios -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="own_vehicle">Owns Vehicle?</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="own_vehicle-0">
                                <input type="radio" name="own_vehicle" id="own_vehicle-0"
                                       value="0" <?= $user['own_vehicle'] == 0 ? "checked" : "" ?> >
                                No
                            </label>
                            <label class="radio-inline" for="own_vehicle-1">
                                <input type="radio" name="own_vehicle" id="own_vehicle-1"
                                       value="1" <?= $user['own_vehicle'] == 1 ? "checked" : "" ?>>
                                Yes
                            </label>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label"
                               for="working_experience"><?= __('Working Experience (years)') ?></label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>

                                </div>
                                <input id="working_experience" name="working_experience" type="text"
                                       placeholder="Enter time period " class="form-control input-md"
                                       value="<?= $user['working_experience'] ?>">


                            </div>

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="user_description"><?= __('Description') ?></label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="10" id="user_description" name="user_description"
                                      placeholder="<?= __('Describe here what u can do, which equipment you have and know how to use.') ?>"><?= $user['user_description'] ?></textarea>
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button id="btn_sbm" class="btn btn-success" type="submit"><span
                                        class="glyphicon glyphicon-thumbs-up"></span> Submit
                            </button>
                            <a onclick="window.location.href = 'users/view/<?= $user['user_id'] ?>"
                               class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span>
                                Clear</a>

                        </div>
                    </div>
                    <!-- BUTTONS -->

                </fieldset>
            </form>
        </div>
        <div class="col-md-2 hidden-xs">
            <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>


    </div>
</div>
<?php else: ?>
    <div style="margin: 0 auto;width: 800px;">
        <div>
            <h3>Te ei peaks siin lehel olema!</h3>
        </div>
        <img src="http://www.slappytickle.com/wp-content/uploads/2013/03/what-you-looking-at.jpg">
    </div>


<?php endif; ?>
<script>


    $('#btn_sbm').on('click', function () {

        event.preventDefault();

        var data = $('form').serialize();
        $.post("users/add_user", data, function (data) {
            if (data == 'ok') {
                alert("Andmed muudetud!");
                window.location.reload(true);
            } else {
                alert(data);
                alert("Midagi läks valesti!");
                //window.location.reload(true);
            }
        })
    })

    function handleFiles() {
        var selectedFile = document.getElementById('input').files[0];

        alert(selectedFile);
    }

</script>