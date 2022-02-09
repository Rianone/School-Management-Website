<?php
session_abort();
session_destroy();
header("location: ../login.php");