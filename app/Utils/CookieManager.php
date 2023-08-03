<?php
namespace App\Utils;
class CookieManager {
  
    public static function setCookie($name, $value, $expiry = 0, $path = '/', $domain = '', $secure = false, $httpOnly = true) {
      setcookie($name, $value, $expiry, $path, $domain, $secure, $httpOnly);
    }
    
    public static function getCookie($name) {
      if (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
      }
      return null;
    }
    
    public static function deleteCookie($name, $path = '/', $domain = '') {
      setcookie($name, '', time() - 3600, $path, $domain);
      unset($_COOKIE[$name]);
    }
    
    public static function hasCookie($name) {
      return isset($_COOKIE[$name]);
    }
    
  }
  