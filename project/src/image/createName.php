<?php
/**
 * @param array $file
 * @return string
 */
function createName(array $file): string
{
    $hash_file = hash_file('md5', $file['tmp_name']);
    $randomValue = mt_rand(100000, 999999);
    $time = gettimeofday(true);

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$value = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
		$value = $_SERVER['REMOTE_ADDR'];
	} else {
        $value = '';
    }

    $hash = md5($hash_file . $time . $randomValue . $value);

    return $hash;
}
