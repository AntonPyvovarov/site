<?php

namespace Common;


class Session

{


    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    /**
     * delete user
     * @param $key
     * @return null
     */
    public static function delete($key){
        if (isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
        return null;
}

    /**
     * finish session
     */
public static function destroy(){
        session_destroy();
}

}