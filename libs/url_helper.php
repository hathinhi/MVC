<?php
/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 07/07/2017
 * Time: 16:38
 */

if (!function_exists('site_url')) {
    function site_url($protocol = NULL) {
        return URL . $protocol;
    }
}

if (!function_exists('base_url')) {
    function base_url($protocol = NULL) {
        return URL . $protocol;
    }
}

