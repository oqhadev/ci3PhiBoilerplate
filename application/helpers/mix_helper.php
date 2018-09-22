<?php 
function readJSON($path)
{
    $string = file_get_contents($path);
    $arraay = json_decode($string,true);
    return $arraay;
}
function mix($value='')
{
        $get_setting = readJSON('assets/mix-manifest.json');
        return $get_setting[$value];
}
function js($value='')
{
    return '<script type="text/javascript" src="'.base_url("assets".mix($value)).'"></script>';
}