<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 22/07/2017
 * Time: 15:54
 */
class GoogleUser extends Model {
    protected $userTbl = "google_users";

    function checkUser($userData = array()) {
        if (!empty($userData)) {
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM " . $this->userTbl . " WHERE oauth_provider = '" . $userData['oauth_provider'] . "' AND oauth_uid = '" . $userData['oauth_uid'] . "'";
            $prevResult = $this->db->base_query($prevQuery);
            if ($prevResult->num_rows > 0) {
                //Update user data if already exists
                $query = "UPDATE " . $this->userTbl . " SET first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', locale = '" . $userData['locale'] . "', picture = '" . $userData['picture'] . "', link = '" . $userData['link'] . "', modified = '" . date("Y-m-d H:i:s") . "' WHERE oauth_provider = '" . $userData['oauth_provider'] . "' AND oauth_uid = '" . $userData['oauth_uid'] . "'";
                $update = $this->db->base_query($query);
            } else {
                //Insert user data
                $query = "INSERT INTO " . $this->userTbl . " SET oauth_provider = '" . $userData['oauth_provider'] . "', oauth_uid = '" . $userData['oauth_uid'] . "', first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', locale = '" . $userData['locale'] . "', picture = '" . $userData['picture'] . "', link = '" . $userData['link'] . "', created = '" . date("Y-m-d H:i:s") . "', modified = '" . date("Y-m-d H:i:s") . "'";
                $insert = $this->db->base_query($query);
            }

            //Get user data from the database
            $result = $this->db->base_query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        //Return user data
        return $userData;
    }
}