<?php
include('login.php');

$sql = 'SELECT `Customer_ID#`, `FName`, `LName`, `Email`, `Phone#` FROM `customer`';

$result = mysqli_query($conn, $sql);

$form = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">
<?php include('../Page layout\header.php'); ?>
<h3 class="center red-text">Customer and Services</h3>
<div class="container">
    <div class="row">
        <?php
        foreach ($form as $form) { ?>
            <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <?php

                        $cID = htmlspecialchars($form['Customer_ID#']);
                        echo "Customer ID: " . $cID . "<br>" . "Name: " . htmlspecialchars($form['FName'])
                            . " " . htmlspecialchars($form['LName']) . "<br>" . "Email: " . htmlspecialchars($form['Email'])
                            . "<br>" . "Phone #: " . htmlspecialchars($form['Phone#']). "<br>" ;

                        $sql = "SELECT s.`Service_ID#`, s.`Service_Date` FROM service s WHERE s.`Customer_ID#` = $cID  ORDER BY s.`Service_Date`";
                        $result = mysqli_query($conn, $sql);
                        $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        mysqli_free_result($result);

                         foreach($services as $services){
                             echo "S_ID: " . $services['Service_ID#'] . "<br>" . " Date: " . $services['Service_Date']. "<br>";
                         }
                        
                        //echo 

                        ?>


                    </div>
                </div>
            </div>

        <?php } 
        mysqli_close($conn);?>
    </div>
</div>
<?php include('../Page layout\footer.php'); ?>

</html>