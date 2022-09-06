<?php
    session_start();

    include 'avatar_process.php';

    if(isset($_POST['change'])){
        $newData = [];
        $lines = file('../accounts.db');
        foreach($lines as $line){
            $lineArray = explode('@@@', $line);
            if($lineArray[1] == $_SESSION['username']){
                $lineArray[3] = saveAvatar();
                $newLine = implode('@@@', $lineArray);
                $newData[] = $newLine;
            } else{
                $newData[] = $line;
            }
        }
        file_put_contents('../accounts.db', $newData);
        header ('location: ../my_account.php');
    }
?>