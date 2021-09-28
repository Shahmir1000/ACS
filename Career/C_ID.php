<?php

include('../Page layout/header.php'); 
if(!isset($_SESSION['user'])){
?>
<div class="container center">
    <h3 > This page is only for Employees. <br>
         Please Login to view this page <br><br><br><br>
    </h3>
</div>

<?php
include('../Page layout/footer.php');
exit();
}

$i = $_GET['ID'];

include('login.php');

$sql = "SELECT CONCAT(c.`FName`, ' ', c.`LName`) AS `Name`, c.`Email`, c.`Phone#` FROM customer c WHERE c.`Customer_ID#`=$i ";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT s.`Service_ID#` FROM service s JOIN customer c ON s.`Customer_ID#`= c.`Customer_ID#` WHERE s.`Customer_ID#`=$i ORDER BY s.`Service_Date` DESC";
$result = mysqli_query($conn, $sql);
$service_ID = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container">
        <h3 class="center">Customer Details</h3>

        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Phone#</th>
                <th>Services</th>
            </thead>

            <tbody>
                <td>
                    <?php
                    echo $customer[0]['Name'];
                    ?>
                </td>
                <td>
                    <?php
                    echo $customer[0]['Email'];
                    ?>
                </td>
                <td>
                    <?php
                    echo $customer[0]['Phone#'];
                    ?>
                </td>
                <td>
                    <?php
                    echo '-';
                    foreach ($service_ID as $id) {
                        echo  implode($id) . "-";
                    }
                    ?>
                </td>
            </tbody>

        </table>
        <?php
        foreach ($service_ID as $num) {
            $num = implode($num);
            $sql = "SELECT s.`Service_ID#`, s.Service_Date, s.Service_Type, CONCAT(s.`Address`, ' ', s.`City`, ' ', s.Province, ' ',s.`Postal_Code`) AS `Address` , s.`Em_ID#`, s.Cost, s.Notes, s.Images FROM service s WHERE s.`Service_ID#` = $num ";
            $result = mysqli_query($conn, $sql);
            $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
        ?>

            <div class="row center">
                <div class="card-panel">
                    <?php $s_ID = $services[0]["Service_ID#"]; ?>
                    <h4 class="center">
                        Service <?php echo $s_ID; ?>
                    </h4>
                    <div class="row left-align">
                        <div class="col s8 push-s2">
                            Em_ID:
                            <div class="right-align">
                                <?php
                                echo $services[0]['Em_ID#'];
                                ?>
                            </div>
                            <div class="divider"></div>

                            Service Date:
                            <div class="right-align">
                                <?php
                                echo $services[0]['Service_Date'];
                                ?>
                            </div>
                            <div class="divider"></div>
                            Address:
                            <div class="right-align">
                                <?php
                                echo $services[0]['Address'];
                                ?>
                            </div>
                            <div class="divider"></div>
                            
                            Sevice Price:
                            <div class="right-align">
                                <?php
                                echo "$" . $services[0]['Cost'];
                                ?>
                            </div>
                            <div class="divider"></div>

                            Service Type:
                            <div class="right-align">
                                <?php
                                echo $services[0]['Service_Type'];
                                ?>
                            </div>
                            <div class="divider"></div>

                            <?php
                            if ($services[0]['Service_Type'] == "ac_install") {
                                $sql = "SELECT ac.`AC_ID#`, ac.`ac_model#`,ac.`ac_serial#`, ac.`coil_model#`, ac.`coil_serial#` FROM ac_instalation ac JOIN service s ON s.`Service_ID#`= ac.`Service_ID#` WHERE s.`Service_ID#` = $s_ID";
                                $result = mysqli_query($conn, $sql);
                                $ac = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            ?>
                                AC ID:
                                <div class="right-align">
                                    <?php
                                    echo $ac[0]['AC_ID#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                AC Model#:
                                <div class="right-align">
                                    <?php
                                    echo $ac[0]['ac_model#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                AC Serial#:
                                <div class="right-align">
                                    <?php
                                    echo $ac[0]['ac_serial#'];
                                    ?>
                                </div>
                                <div class="divider"></div>

                                Coil Model#:
                                <div class="right-align">
                                    <?php
                                    echo $ac[0]['coil_model#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                Coil Serial#:
                                <div class="right-align">
                                    <?php
                                    echo $ac[0]['coil_serial#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                            <?php
                            }

                            if ($services[0]['Service_Type'] == "furnace_install") {
                                $sql = "SELECT f.`Furnace_ID#`,f.`furnace_model#`, f.`furnace_serial#`, f.GoodCare FROM furnace_installation f JOIN service s ON s.`Service_ID#` = f.`Service_ID#` Where f.`Service_ID#` =  $s_ID";
                                $result = mysqli_query($conn, $sql);
                                $furnace = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            ?>
                                Furnace ID:
                                <div class="right-align">
                                    <?php
                                    echo $furnace[0]['Furnace_ID#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                Furnace Model#:
                                <div class="right-align">
                                    <?php
                                    echo $furnace[0]['furnace_model#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                Furnace Serial#:
                                <div class="right-align">
                                    <?php
                                    echo $furnace[0]['furnace_serial#'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                                Good Care:
                                <div class="right-align">
                                    <?php
                                    echo $furnace[0]['GoodCare'];
                                    ?>
                                </div>
                                <div class="divider"></div>
                            <?php
                            }
                            ?>

                            Note:
                            <div class="right-align">
                                 <?php
                               echo "<p> {$services[0]['Notes']} </p>";
                               
                                ?>
                            </div>
                            <div class="divider"></div>
                            Images:
                            <div class="right-align">
                                <?php
                                echo $services[0]["Images"];
                                ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        <?php
        }
        mysqli_close($conn);
        ?>

    </div>
</body>
<?php include('../Page layout/footer.php'); ?>
</html>