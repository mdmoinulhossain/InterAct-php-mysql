<?php

/**
 * Uses random_int as core logic and generates a random string
 * random_int is a pseudorandom number generator
 *
 * @param int $length
 * @return string
 */
function getRandomStringRandomInt($length = 16)
{
    $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pieces = [];
    $max = mb_strlen($stringSpace, '8bit') - 1;
    for ($i = 0; $i < $length; ++ $i) {
        $pieces[] = $stringSpace[random_int(0, $max)];
    }
    return implode('', $pieces);
}
echo "<br>Using random_int(): " . getRandomStringRandomInt();

/**
 * Uses the list of alphabets, numbers as base set, then picks using array index
 * by using rand() function.
 *
 * @param int $length
 * @return string
 */
function getRandomStringRand($length = 16)
{
    $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringLength = strlen($stringSpace);
    $randomString = '';
    for ($i = 0; $i < $length; $i ++) {
        $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
    }
    return $randomString;
}
echo "<br>Using rand(): " . getRandomStringRand();

/**
 * Uses the list of alphabets, numbers as base set.
 * Then shuffle and get the length required.
 *
 * @param int $length
 * @return string
 */
function getRandomStringShuffle($length = 16)
{
    $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringLength = strlen($stringSpace);
    $string = str_repeat($stringSpace, ceil($length / $stringLength));
    $shuffledString = str_shuffle($string);
    $randomString = substr($shuffledString, 1, $length);
    return $randomString;
}
echo "<br>Using shuffle(): " . getRandomStringShuffle();

/**
 * Get bytes of using random_bytes or openssl_random_pseudo_bytes
 * then using bin2hex to get a random string.
 *
 * @param int $length
 * @return string
 */
function getRandomStringBin2hex($length = 16)
{
    if (function_exists('random_bytes')) {
        $bytes = random_bytes($length / 2);
    } else {
        $bytes = openssl_random_pseudo_bytes($length / 2);
    }
    $randomString = bin2hex($bytes);
    return $randomString;
}
echo "<br>Using bin2hex(): " . getRandomStringBin2hex();

/**
 * Using mt_rand() actually it is an alias of rand()
 *
 * @param int $length
 * @return string
 */
function getRandomStringMtrand($length = 16)
{
    $keys = array_merge(range(0, 9), range('a', 'z'));
    $key = "";
    for ($i = 0; $i < $length; $i ++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    $randomString = $key;
    return $randomString;
}
echo "<br>Using mt_rand(): " . getRandomStringMtrand();

/**
 *
 * Using sha1().
 * sha1 has a 40 character limit and always lowercase characters.
 *
 * @param int $length
 * @return string
 */
function getRandomStringSha1($length = 16)
{
    $string = sha1(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}
echo "<br>Using sha1(): " . getRandomStringSha1();

/**
 *
 * Using md5().
 *
 * @param int $length
 * @return string
 */
function getRandomStringMd5($length = 16)
{
    $string = md5(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}
echo "<br>Using md5(): " . getRandomStringMd5();

/**
 *
 * Using uniqid().
 *
 * @param int $length
 * @return string
 */
function getRandomStringUniqid($length = 16)
{
    $string = uniqid(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}
echo "<br>Using uniqid(): " . getRandomStringUniqid();
?>