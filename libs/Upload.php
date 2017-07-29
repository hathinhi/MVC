<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 29/07/2017
 * Time: 13:47
 */
class Upload {
    function __construct() {
    }

    function uploadImage($path,$file) {
        $link_file = NULL;
        if ($file['name'] != NULL) {
            $target_file = $path . $file['name'];
            if (file_exists($target_file)) {//test file existed
                echo "Sorry, file already exists.";
            } else {
                if ($file['type'] == "image/jpeg"
                    || $file['type'] == "image/png"
                    || $file['type'] == "image/gif"
                ) {
                    if ($file['size'] > 1048576) {//test size
                        echo "File không được lớn hơn 1mb";
                    } else {
                        $tmp_name = $file['tmp_name'];//name file
                        $name = time() . '_' . $file['name'];
                        // Upload file
                        move_uploaded_file($tmp_name, $path . $name);
                        echo "File uploaded! <br />";
                        $link_file = $path . $name;
                    }
                } else {
                    echo "Kiểu file không hợp lệ";
                }
            }
        } else {
            echo "Vui lòng chọn file";
        }
        return $link_file;
    }
}