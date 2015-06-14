<?php
        $File = "data/value.log";
        //This is the text file we keep our count in, that we just made
                $handle = fopen($File, 'r+') ;
        //Here we set the file, and the permissions to read plus write
                $data = fread($handle, 512) ;
        //Actully get the count from the file
                $recv = $_GET['value'];
                $date = date('Y-m-d\TH:i:sO');
                $count = $date . " # " . $recv . PHP_EOL . $data;
        //Add the new visitor to the count
        //      print "<font size=2>Number of times visited : " . $count . "</font><br /><hr /> ";
        //Prints the count on the page
                fseek($handle, 0) ;
        //Puts the pointer back to the begining of the file
                fwrite($handle, $count) ;
        //saves the new count to the file
                fclose($handle) ;
        //closes the file

?>
