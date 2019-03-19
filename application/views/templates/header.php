<!doctype html>
<html>

<head>
    <title>ROLES BASED AUTHENTICATION</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid mx-2">
            <div clas="row">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <?php
                        $attr = array(
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Log out from current session'
                        );
                        $upload_file_btn_attr = array(
                            'class' => 'btn btn-success btn-sm mr-2',
                            'title' => 'Upload a New file'
                        );
                        echo anchor('Login/logout', 'Log Out', $attr); 
                        echo anchor('upload', 'Upload New File', $upload_file_btn_attr)
                    ?>
                    <!-- <a class="btn btn-success btn-sm" href="http://localhost/Training/index.php/Login/logout">Log Out</a> -->
                </div>
            </div>
            <h1 class="display-4">ROLES BASED AUTHENTICATION SYSTEM</h1>
            <p class="lead">Role-based-access-control (RBAC) is a policy neutral access control mechanism defined around
                roles and privileges.</p>
        </div>
    </div>
