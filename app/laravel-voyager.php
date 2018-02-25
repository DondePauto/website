<?php

/**
 * Get the Laravel path
 *
 * @param  string  $path
 * @return string
 */
function laravel_path( $path ) {
    return realpath(ABSPATH.'../../../admin').'/'.$path;
}

/**
 * Get a Voyager setting
 *
 * @param  string  $key
 * @param  mixed  $default
 * @return mixed
 */
function voyager_setting( $key, $default=null ) {
    $mysql = new mysqli('localhost', env('DB_USER'), env('DB_PASSWORD'), env('LV_DATABASE'));
    $stmt  = $mysql->prepare('select type, value from settings where `key`=?');
    $stmt->bind_param('s', $key);
    $stmt->execute();

    $result = $stmt->get_result();
    if( !$result->num_rows )
        return $default;
    $setting = (object)$result->fetch_assoc();

    $stmt->close(); $mysql->close();
    return iconv("ISO-8859-1", "UTF-8", $setting->value);
}
