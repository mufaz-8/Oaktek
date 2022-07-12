<?php
    function getAllUsers() {
        $mysql = new mysqli('localhost','root','root','register-bd');
        $result = $mysql->query("SELECT * FROM `users`");
        $mysql->close();
        return resultToArray($result);
    }

    function resultToArray($result) {
        $results = array();
        while (($row = $result->fetch_assoc()) != false) {
            $results[] = $row;
        }
        return $results;
    }

    function getUserOnID($id) {
        $mysql = new mysqli('localhost','root','root','register-bd');
        $result = $mysql->query("SELECT * FROM `users` WHERE id='$id' ");
        $mysql->close();
        return $result->fetch_assoc();
    }

    function getIDOnName($name) {
        $mysql = new mysqli('localhost','root','root','register-bd');
        $result = $mysql->query("SELECT id FROM `users` WHERE name='$name' ");
        $row = $result->fetch_assoc();
        $mysql->close();
        return $row["id"];
    }

    function addMessage($from, $to, $message) {
        $mysql = new mysqli('localhost','root','root','register-bd');
        $mysql->query("INSERT INTO `messages` (`from`, `to`, `message`) VALUES ('$from', '$to', '$message')");
        $mysql->close();

    }

    function getAllMessages($to) {
        $mysql = new mysqli('localhost','root','root','register-bd');
        $result = $mysql->query("SELECT * FROM `messages` WHERE `to`='$to'");
        if ($result !== false) {
          return resultToArray($result);
        } else {
            echo "error: ". $mysql->error;
        }
        $mysql->close();
    }

    function checkUser($name, $passw) {
        if (($name == "") || ($passw =="")) return false;
        $mysql = new mysqli('localhost','root','root','register-bd');
        $result = $mysql->query("SELECT passw FROM `users` WHERE name = '$name");
        $user = $result->fetch_assoc();
        $real_password = $user['passw'];
        $mysql->close();
        return $real_password == $passw;

    }
?>
