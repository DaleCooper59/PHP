<?php
function sessionOk($connected){
    if(!isset($connected) || $connected == false){
    header('Location:form.php?error=4');
}
}
