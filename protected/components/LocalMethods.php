<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 05.03.14
 * Time: 0:02
 */

class LocalMethods {

    public function getWords($text,$number){
        return preg_match("/((\S+[\s-]+){".$number."})/s", $text, $m) ? rtrim($m[1]) . '...' : $text;
    }
}