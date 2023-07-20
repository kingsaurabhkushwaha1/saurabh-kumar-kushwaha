<?php
         $dbhost = 'vendoruat.kent.co.in';
         $dbuser = 'saurabhk1';
         $dbpass = 'H@ppy#12';
         $dbname = 'appraisal';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }

         elseif ($mysqli->errno) {

            printf("Could not create table: %s<br />", $mysqli->error);

         }

         ?>