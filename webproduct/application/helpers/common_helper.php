<?php
function public_url($url = '')
{
	return base_url('public/'.$url);
}

function pre($list, $exit = true)
{
    echo "<pre>";
    print_r($list);
    if($exit)
    {
        die();
    }
}

function changeName($str) {
    $s = str_replace("/", " ", $str);
    $s = str_replace("(", "", $s);
    $s = str_replace(")", "", $s);
    $s = str_replace(" ", "-", $s);
    $s = str_replace("@", "", $s);
    $s = str_replace("!", "", $s);
    $s = str_replace("#", "", $s);
    $s = str_replace("$", "", $s);
    $s = str_replace("%", "", $s);
    $s = str_replace("^", "", $s);
    $s = str_replace("&", "", $s);
    $s = str_replace("*", "", $s);
    $s = str_replace("=", "", $s);
    $s = str_replace("+", "", $s);
    $s = str_replace("[", "", $s);
    $s = str_replace("]", "", $s);
    $s = str_replace("|", "", $s);
    $s = str_replace("{", "", $s);
    $s = str_replace("}", "", $s);
    $s = str_replace("/", "", $s);
    $s = str_replace("?", "", $s);
    $s = str_replace(",", "", $s);
    $s = str_replace("<", "", $s);
    $s = str_replace(">", "", $s);
    $s = str_replace("?", "", $s);
    $s = str_replace("'", "", $s);
    return $s;
}