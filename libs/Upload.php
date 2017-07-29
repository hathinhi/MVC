<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 29/07/2017
 * Time: 13:47
 */
class Upload {
    protected $_configImage = array();

    function __construct() {
    }

    function uploadImage($path, $file) {
        include("config/image.php");
        if (!isset($image) OR !is_array($image)) {
            return;
        }
        $this->_configImage = array_merge($this->_configImage, $image);
        var_dump('config image', $this->_configImage);
        $link_file = NULL;
        if ($file['name'] != NULL) {
            $target_file = $path . $file['name'];
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (file_exists($target_file)) {//test file existed
                echo "Sorry, file already exists.";
            } else {
                $boolType = TRUE;
                foreach ($this->_configImage['type'] as $type) {
                    $boolType = $boolType && ($imageFileType != $type);
                }
                if ($boolType) {
                    echo "Kiểu file không hợp lệ";
                } else {
                    if ($file['size'] > $this->_configImage['size']) {//test size
                        echo "File không được lớn hơn 1mb";
                    } else {
                        $tmp_name = $file['tmp_name'];//name file
                        $name = time() . '_' . $file['name'];
                        // Upload file
                        move_uploaded_file($tmp_name, $path . $name);
                        echo "File uploaded! <br />";
                        $link_file = $path . $name;
                    }
                }
            }
        } else {
            echo "Vui lòng chọn file";
        }
        return $link_file;
    }
}