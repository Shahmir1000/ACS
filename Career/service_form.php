<?php

$form = array(
    'first_name', 'last_name', 'email', 'phone',  'address', 'city', 'province',
    'postal_code', 'em_id', 'price', 'ac_model', 'ac_serial', 'coil_model', 'coil_serial',
    'furnace_model', 'furnace_serial', 'good_care', 'service', 'notes', 'file' , 'date'
);


$first_name = $last_name = $email = $phone =  $address =
    $city = $province = $postal_code = $em_id = $price =
    $date = $ac_model = $ac_serial = $coil_model = $coil_serial = 
    $furnace_model = $furnace_serial = $notes = $file = null;
    
    $good_care = 'NO';
    $service = 'other';

include('login.php');
$error = "";
if (isset($_POST['submit'])) {
    $error = "";

    foreach ($form as $value) {
        $$value = htmlspecialchars($_POST[$value]);
        echo $value." = ". $$value . "<br>";
    }

    for($i = 0; $i<10 ; $i++){
        $value = $form[$i];
        if(empty($$value))
        {
            $error = "Field $value is Empty!";
        }
        
    }

    $date_now = new DateTime();
    $date2 = new DateTime($date);
    if( $date2 > $date_now)
    {
        $error = "Date is invalid";
    }
    if($service == 'ac_install'){
        if(empty($ac_model)|| empty($ac_serial) || empty($coil_serial)|| empty($coil_model))
        {
            $error = 'AC Fields are empty!';
        }
    }
    if($service == 'furnace_install'){
        if(empty($furnace_model)|| empty($furnace_serial))
        {
            $error = 'Furnace Fields are empty!';
        }
    }

    if(empty($error)){
        
        include('login.php');
        foreach ($form as $value) {
            $$value = mysqli_real_escape_string($conn, $_POST[$value]);
        }
        
        $cus_id = NULL;
        $query1 = "INSERT INTO `customer` (`Customer_ID#`, `FName`, `LName`, `Email`, `Phone#`) VALUES (NULL, '$first_name', '$last_name', '$email', '$phone')";
        $result  = $conn->query($query1);
        if(!$result) die($conn->error);
        else{
            
            $cus_id = $conn-> insert_id;
            $query2 = "INSERT INTO `service` (`Service_ID#`, `Customer_ID#`, `Service_Date`, `Service_Type`, `Address`,`City`,`Postal_Code`,`Province`, `Em_ID#`, `Cost`, `Notes`, `Images`) 
            VALUES (NULL, '$cus_id', '$date', '$service', '$address', '$city' ,'$postal_code' ,'$province' , '$em_id', '$price', '$notes', '$file')"; 
            $result  = $conn->query($query2);
            if(!$result) die($conn->error);
            else{
                $ser_id = $conn-> insert_id;
                if($service == 'ac_install')
                {
                    $query3 = "INSERT INTO `ac_instalation` (`AC_ID#`, `Service_ID#`, `ac_model#`, `ac_serial#`, `coil_model#`, `coil_serial#`) 
                        VALUES (NULL, '$ser_id', '$ac_model', '$ac_serial', '$coil_model', '$coil_serial') ";
                
                    $result  = $conn->query($query3);
                    if(!$result) die($conn->error);
                }

                if($service == 'furnace_install')
                {
                    $query3 ="INSERT INTO `furnace_installation` (`Furnace_ID#`, `Service_ID#`, `furnace_model#`, `furnace_serial#`, `GoodCare`) 
                    VALUES (NULL, '$ser_id', '$furnace_model', '$furnace_serial', '$good_care')";

                    $result  = $conn->query($query3);
                    if(!$result) die($conn->error);
                }
                
                header("Location:C_ID.php?ID=$cus_id");
            }
        }
        
    }
    else{
        echo $error;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('../Page layout/header.php'); ?>
    <br>
    <br>
    <section class="container">

        <form class="col s12" action="service_form.php" id="service_form" method="POST">

            <div class="row">
                <div class="input-field col s6">
                    <Label for="first_name">First Name</Label>
                    <input type="text" class="validate" id="first_name" name="first_name" onfocusout="validateFirstName()" value="<?php echo $first_name ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s6">
                    <Label for="last_name">Last Name</Label> 
                    <input type="text" class="validate" id="last_name" name="last_name" onfocusout="validateLastName()" value="<?php echo $last_name ?>" >
                    <span class="helper-text"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <Label for="address">Address</Label>
                    <input type="text" class="validate" id="address" name="address" onfocusout="validateAddress()" value="<?php echo $address ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s3">
                    <Label for="city">City</Label>
                    <input type="text" class="validate" id="city" name="city" onfocusout="validateCity()" value="<?php echo $city ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s3">
                    <Label for="province">Province</Label>
                    <input type="text" class="validate" id="province" name="province" placeholder="ON" onfocusout="validateProvince()" value="<?php echo $province ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s2">
                    <Label for="postal_code">Postal Code</Label>
                    <input type="text" class="validate" id="postal_code" name="postal_code" placeholder="A1A 1A1" onfocusout="validatePostalCode()"value="<?php echo $postal_code ?>">
                    <span class="helper-text"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <Label for="email">Email</Label>
                    <input type="email" class="validate" id="email" name="email" onfocusout="validateEmail()" value="<?php echo $email ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s4">
                    <Label for="phone">Phone #</Label>
                    <input type="text" class="validate" id="phone" name="phone" onfocusout="validatePhone()" value="<?php echo $phone ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s2">
                    <Label for="em_id">Employee ID #</Label>
                    <input type="text" class="validate" id="em_id" name="em_id" placeholder="1" onfocusout="validateEmID()" value="<?php echo $em_id ?>">
                    <span class="helper-text"></span>
                </div>

            </div>

            <label for="service" style="font-size:medium;" class="col s6">Service Type</label>

            <div class="row">
                <div class="input-field col s6 grey lighten-4">
                    <select name="service" id="service" class="right browser-default" onfocusout="validateService()" value="<?php echo $service ?>">
                        <option value="" id="hide" disabled selected></option>
                        <option value="ac_install" id="ac">Ac Installation</option>
                        <option value="furnace_install" id="furnace">Furnace Installation</option>
                        <option value="other" id="other">Other</option>
                    </select>
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s3">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" onfocusout="validatePrice()" value="<?php echo $price ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s3">
                    <input type="date" id="date" name="date" onfocusout="validateDate()" value="<?php echo $date ?>">
                    <span class="helper-text"></span>
                </div>
            </div>

            <div class="row" id="ac_unit">
                <div class="input-field col s6">
                    <label for="ac_model">AC Model#</label>
                    <input type="text" id="ac_model" name="ac_model" onfocusout="validateAcModel()" value="<?php echo $ac_model ?>">
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s6">
                    <label for="ac_serial">AC Serial#</label>
                    <input type="text" id="ac_serial" name="ac_serial" onfocusout="validateAcSerial()" value="<?php echo $ac_serial ?>">
                    <span class="helper-text"></span>
                </div>
                <div class="input-field col s6">
                    <label for="coil_model">Coil Model#</label>
                    <input type="text" id="coil_model" name="coil_model" onfocusout="validateCoilModel()" value="<?php echo $coil_model ?>">
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s6">
                    <label for="coil_serial">Coil Serial#</label>
                    <input type="text" id="coil_serial" name="coil_serial" onfocusout="validateCoilSerial()" value="<?php echo $coil_serial ?>">
                    <span class="helper-text"></span>
                </div>
            </div>

            <div class="row" id="furnace_unit">
                <div class="input-field col s6">
                    <label for="furnace_model">Furnace Model#</label>
                    <input type="text" id="furnace_model" name="furnace_model" onfocusout="validateFurnaceModel()" value="<?php echo $furnace_model ?>">
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s6">
                    <label for="Furnace_serial">Furnace Serial#</label>
                    <input type="text" id="furnace_serial" name="furnace_serial" onfocusout="validateFurnaceSerial()" value="<?php echo $furnace_serial ?>">
                    <span class="helper-text"></span>
                </div>

                <div class="input-field col s2">
                    <label>
                        <input type="checkbox" id="good_care" name="good_care" value="YES" value="<?php echo $good_care?>">
                        <span class="helper-text">Good Care</span>
                    </label>
                </div>
            </div>

            <div class="row" id="discription">

                <div class="input-field col s8">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" class="materialize-textarea" value="<?php $notes ?>"></textarea>
                    <span class="helper-text"></span>
                </div>

                <div class="file-field input-field col s4">
                    <div class="btn black waves-effect waves-light hoverable right">
                        <input type="file" multiple id="file" name="file" value="<?php $file ?>">
                        <span>File</span>
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>

            </div>

        </form>
        <div class="red-text"><b><?php echo $error?> </b><br> </div>
        <div class="row">
            <button class="btn waves-effect waves-light hoverable black" type="submit" form="service_form" name="submit" id="submit" value="submit">
                <span>Submit</span>
                <i class="material-icons right">send</i>
            </button>
        </div>
 
        
    </section>

    <br>
    <?php include('../Page layout/footer.php'); ?>

    <script>
        $(document).ready(function() {
            $("#hide").hide();
            $("#ac_unit").hide();
            $("#furnace_unit").hide();
            $("#service").click(function() {
                if (document.getElementById("service").value == 'ac_install') {
                    $("#furnace_unit").hide();
                    $("#ac_unit").show();
                }
                if (document.getElementById("service").value == 'furnace_install') {
                    $("#ac_unit").hide();
                    $("#furnace_unit").show();
                }
                if (document.getElementById("service").value == 'other') {
                    $("#ac_unit").hide();
                    $("#furnace_unit").hide();
                }

            })
        });
    </script>

    <script src="validation.js"></script>
</body>

</html>