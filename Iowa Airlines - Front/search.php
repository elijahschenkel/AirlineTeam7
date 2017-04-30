<?php
    error_reporting(E_ALL);

    session_start();

    //Start Database
    $IP = "127.0.0.1";
    $user = "FSE";
    $pass = "airline";
    $db = "Airline_Users";
    $con = mysqli_connect($IP, $user, $pass, $db);

    // Check connection
    if (!$con) {
        echo "<div>";
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "</div>";
    }

    $tickettype = isset($_POST["tt"]) ? $_POST["tt"] : null;

    $flightpref = isset($_POST["flightpref"]) ? $_POST["flightpref"] : null;

    $from = isset($_POST["from"]) ? $_POST["from"] : null;

    $to = isset($_POST["to"]) ? $_POST["to"] : null;

    $departdate = isset($_POST["dep_date"]) ? $_POST["dep_date"] : null;

    $returndate = isset($_POST["ret_date"]) ? $_POST["ret_date"] : null;

    $num_adults = isset($_POST["num_adults"]) ? $_POST["num_adults"] : null;

    $num_childs = isset($_POST["num_childs"]) ? $_POST["num_childs"] : null;

    if ($from && $departdate && $num_adults) {
<<<<<<< HEAD
        $query = "SELECT flight_number AND departure_loc AND departure_date AND departure_time AND arrival_loc AND arrival_date AND arrival_time FROM flights WHERE departure_loc = '$from' AND arrival_loc = '$to' AND departure_date = '$departdate'";

       $result = mysqli_query( $con, $query);
        
       while($tableName = mysqli_fetch_row($result)) {
           $table = $tableName[0];
           
           echo '<h3>',$table,'</h3>';
           
           //$query2 = "SELECT flight_number AND departure_loc AND departure_date AND departure_time AND arrival_loc AND arrival_date AND arrival_time FROM flights";
           
           $sql="SELECT  * FROM flights WHERE flight_number=911"; 
           
           $res2 = mysqli_query( $con, $sql); //or die('cannot show columns from '.$table);
           
           if(mysqli_num_rows($res2)) {
               echo '<table cellpadding="4" cellspacing="4">';
               
               echo '<tr><th>Flight Number  |</th><th> Departure Location | </th><th> Departure Date | </th><th> Departure Time | </th><th> Arrival Location | </th><th> Arrival Date | </th><th>  Arrival Time | </th></tr>';
               
               while($row2=mysqli_fetch_row($res2)) {
                   echo '<tr>';
                   
                   $departLocation = $row['departure_loc'];
                   $departDate = $row['departure_date'];
                   $departTime = $row['departure_time'];
                   $arrivalLocation = $row['arrival_loc'];
                   $arrivalDate = $row['arrival_date'];
                   $arrivalTime = $row['arrival_time'];
                   
                   echo  "<ul>\n"; 
                   echo  "<li>" . $departLocation . " " . $departDate .  " " . $departTime . "</li>\n"; 
                   echo  "<li>" . $arrivalLocation . " " . $arrivalDate .  " " . $arrivalTime . "</li>\n"; 
                   echo  "</ul>";
                   
                   foreach($row2 as $key=>$value){
                       echo '<td>',$value,'</td>';
                   }
                   echo '</tr>';
               }
               echo '</table><br />';
           }
       }
    }/*
    	$sql="SELECT  * FROM Contacts WHERE ID=" . $contactid; 
    	//-run  the query against the mysql query function 
    	$result=mysql_query($sql); 
    	//-create  while loop and loop through result set 
    	while($row=mysql_fetch_array($result)){ 
    	  $FirstName =$row['FirstName']; 
    	            $LastName=$row['LastName']; 
    	            $PhoneNumber=$row['PhoneNumber']; 
    	            $Email=$row['Email']; 
    	//-display  the result of the array 
    	echo  "<ul>\n"; 
    	echo  "<li>" . $FirstName . " " . $LastName .  "</li>\n"; 
    	echo  "<li>" . $PhoneNumber . "</li>\n"; 
    	echo  "<li>" . "<a href=mailto:" . $Email .  ">" . $Email . "</a></li>\n"; 
    	echo  "</ul>"; */
//        if(!$result){
//            echo "<div>";
//            echo "Sorry, no flights";
//            echo "</div>";
//        }
//        else {
//            echo "yay";
//        }       
=======

        $query = "SELECT * from flights WHERE departure_loc = '$from' AND arrival_loc = '$to' AND departure_date = '$departdate'";

        $result = mysqli_query( $con, $query);

        $arr = array();
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $arr[] = $row;
          }
        }

        echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
        echo "<tr style='font-weight: bold;'>";  
        echo "<td width='150' align='center'>Flight Number</td>";  
        echo "<td width='150' align='center'>Departure Location</td>"; 
        echo "<td width='150' align='center'>Departure Date</td>"; 
        echo "<td width='150' align='center'>Departure Time</td>"; 
        echo "<td width='150' align='center'>Arrival Location</td>"; 
        echo "<td width='150' align='center'>Arrival Date</td>"; 
        echo "<td width='150' align='center'>Arrival Time</td>"; 
        echo "</tr>";

        foreach ($arr as $row) { 
          echo '<td width="150" align=center>' . $row['flight_number'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_loc'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_date'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_time'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_loc'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_date'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_time'] . '</td>';
          echo '</tr>';
        }

        echo "<button type='button' onclick='myFunction()'>New Search</button>";
        echo '<script>
            function myFunction(){
                window.location = "index.html#search"
            }
            </script>';

    }
>>>>>>> master

    else {
        echo "boo";
    }
?>