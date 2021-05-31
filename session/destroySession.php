<?php
session_start();
session_destroy();


header("Refresh:5; url=form.php");