<?php

function isValidphone($phone){
    if(empty($phone)) return true;
    $phone = str_replace([' ','-','(',')'],'', $phone);
    return preg_match('/^(\+88|0088)?01[3-9]\d{8}$/', $phone);
}
function isValidguardian($guardian){
    if(empty($guardian)) return true;
    $guardian = str_replace([' ','-','(',')'],'', $guardian);
    return preg_match('/^(\+88|0088)?01[3-9]\d{8}$/', $guardian);
}

function isValidEmail($email){
    if(empty($email)) return true;
    return filter_var($email,FILTER_VALIDATE_EMAIL);
}

function error($field){
    global $error;
    if(!empty($error[$field]))
        return $error[$field];
}

function old($field,$defaultValue = ""){
    return isset($_POST[$field]) ? $_POST[$field] :$defaultValue;
}