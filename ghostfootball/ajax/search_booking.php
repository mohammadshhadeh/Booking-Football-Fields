<?php
include('../includes/connection.php');

if (isset($_GET['search'])) {

    $query2  = "SELECT * FROM booking WHERE 
    aside_id = {$_GET['aside_id']} AND booking_date='{$_GET['search']}' order by hour_start,hour_end ";
    $result2 = mysqli_query($conn,$query2);

    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo "<tr>
                <td class='default_time_bg'>";
        echo     $row2['hour_start'] . ' - ' .  $row2['hour_end'];             
        echo "  </td>
                <td class='default_time_bg'> ";
        echo '$'. $row2['price'];
        echo"      </td>
        <td class='default_time_bg'>
        <i class='menu-icon fas fa-futbol'></i> 
        </td>
        </tr>";
    }  

}
?>