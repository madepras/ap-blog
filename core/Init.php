<?php
    require_once 'Config.php';
    require_once 'Database.php';
    require_once 'Utils.php';
    require_once 'Routes.php';

    if (!session_id()) session_start();