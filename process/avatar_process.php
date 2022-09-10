<?php
    function saveAvatar(){
        $fileName = uniqid();
        $path = '../images/avatars/'.$fileName.'.png';
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/avatars/'.$fileName.'.png');
        return $path;
    }