<?php

namespace u311\carexperiment\login\ctrl;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once __DIR__ . '/../../game/gamefiles/php/includes/DbConnectInfo.php';

class SQLUserManager {

    static function createUser() {

        $dbinfo = \DbConnectInfo::getDBConnectInfoObject();

        
        $mysqli = new \mysqli($dbinfo->getServer(), $dbinfo->getUserName(), $dbinfo->getPassword(), $dbinfo->getDatabaseName(), $dbinfo->getPort());

        
        if ($mysqli->connect_errno) {
            $this->throwDBExceptionOnError( $mysqli->connect_error, $mysqli->connect_errno);
        }

        //Find if there is a username/password matching the input
        $user_insert_q = "INSERT INTO `user` VALUES (null,'AUTO','USER','ok@ok.com',now(),'AUTO CREATE')";
        
        if (!$stmt = $mysqli->prepare($user_insert_q)) {
            $this->throwDBExceptionOnError($mysqli->error, $mysqli->errno);
        }

        if (!$stmt->execute()) {
            $this->throwDBExceptionOnError($mysqli->error, $mysqli->errno);
        }

        $new_user_id = $stmt->insert_id;

        $stmt->free_result();
        $stmt->close();
        $mysqli->close();
        
        return $new_user_id;
    }

    protected function throwDBExceptionOnError($errmsg, $errno) {
        throw new Exception($errmsg, $errno);
    }

}
