<?php

require_once('redirect.php');
require_once('helpers.php');
require_once('connect.php');

$user_id = $_SESSION['userdata']['id'];

if (!checkAdminPermissions($con, $user_id)) {
    header('Location: index.php');
}