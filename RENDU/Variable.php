<?php

abstract class Utils{
    //static generateRandomNumber (min, max)

    public static function generateRandomNumber($min, $max){
        return rand($min, $max);
    }
}

?>