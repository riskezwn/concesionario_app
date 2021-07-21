<?php
session_start();
require_once('helpers.php');
destroySession('userdata');
header('Location: ../index.php');