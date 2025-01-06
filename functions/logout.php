<?php

require_once '../core/Init.php';

// Destroy session
session_unset();
session_destroy();

redirect("../" . LOGIN_ROUTE_NAME);
