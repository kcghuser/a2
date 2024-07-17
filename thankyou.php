<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/


/* function filterinput(){
    return filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_INT);
} 
function filterinput(){*/
    
// Postal code  
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Thanks for your order!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <?php 
if(empty($_POST['fullname']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['cardname'])){
    $pattern = '/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/';
    if(preg_match($pattern, $_POST['postal']) !== 1){
        echo "Wrong Postal code, ";
    }
//// 
// Email Validation
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "Enter Valid Email, ";
}

/// Filter Name

if(filter_var($_POST['fullname'], FILTER_SANITIZE_SPECIAL_CHARS)){
    echo "You used special Characters, ";
}

// Filter Credit Card Number
$filterCreditCard = filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_INT);
if($filterCreditCard === false && !preg_match('/^[0-9]{10}$/', $filterCreditCard)){
    echo "Enter a Valid Credit Card Number, ";
}

// Credit Card Month validation 
$creditMonth = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT);
if ($creditMonth === false && !preg_match('/^(0[1-9]|1[0-2])$/', $creditMonth)) {
    echo "Enter a Valid Credit Card Month, ";
}

// Credit Card Year validation 
if($_POST['year'] >= 2024 && $_POST['year'] <= 2029){
$creditYear = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
} else{
    echo "Credit Card Year Invalid, ";
}
// Credit Card Type Validation
if(empty($_POST['cardtype'])){
    echo "Select a Credit card Type, ";
}else{
    
}

 $provinces = [
    'AB' => 'Alberta',
    'BC' => 'British Columbia',
    'MB' => 'Manitoba',
    'NB' => 'New Brunswick',
    'NL' => 'Newfoundland and Labrador',
    'NS' => 'Nova Scotia',
    'ON' => 'Ontario',
    'PE' => 'Prince Edward Island',
    'QC' => 'Quebec',
    'SK' => 'Saskatchewan',
    'NT' => 'Northwest Territories',
    'NU' => 'Nunavut',
    'YT' => 'Yukon'
];


if (isset($_POST['province'])) {
    $selectedProvince = $_POST['province'];

    if (!array_key_exists($selectedProvince, $provinces)):
        echo "You didn't select a Real Province, ";
endif;


$fQ1 = filter_input(INPUT_POST, 'qty1', FILTER_VALIDATE_INT);
if ($fQ1 === false) {
    echo "Enter a valid Quantity 1, ";
}

$fQ2 = filter_input(INPUT_POST, 'qty2', FILTER_VALIDATE_INT);
if ($fQ2 === false) {
    echo "Enter a valid Quantity 2, ";
}

$fQ3 = filter_input(INPUT_POST, 'qty3', FILTER_VALIDATE_INT);
if ($fQ3 === false) {
    echo "Enter a valid Quantity 3, ";
}

$fQ4 = filter_input(INPUT_POST, 'qty4', FILTER_VALIDATE_INT);
if ($fQ4 === false) {
    echo "Enter a valid Quantity 4, ";
}

$fQ5 = filter_input(INPUT_POST, 'qty5', FILTER_VALIDATE_INT);
if ($fQ5 === false) {
    echo "Enter a valid Quantity 5, ";
}

}
}else{
    ?>
    <div>
    <h1><?php echo "Thanks you ". $_POST['fullname'] ?></h1>

    <table>
    <thead>
        <tr>
            <th colspan="4">Address Information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Address:</td>
            <td><?php echo $_POST['address']?></td>
            <td>City:</td>
            <td><?php echo $_POST['city']?></td>
        </tr>
        <tr>
            <td>Province:</td>
            <td><?php echo $_POST['province']?></td>
            <td>Postal Code:</td>
            <td><?php echo $_POST['postal']?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td colspan="3"><?php echo $_POST['email']?></td>
        </tr>
</tbody>
    </table>
    <table>
    <thead>
        <tr>
            <th colspan="3">Order Information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Quantity</td>
            <td>Description</td>
            <td>Cost</td>
        </tr>
        <tr>
    <?php
    if (isset($_POST['qty1']) && !empty($_POST['qty1'])) {
        $addQTY1 = 3799.98 * $_POST['qty1'];
        echo '<td>' . $_POST['qty1'] . '</td>' . '<td>iMac</td>' . '<td>'. $addQTY1 .'</td>';   
    }
    ?>
    <tr>
    <?php
    if (isset($_POST['qty2']) && !empty($_POST['qty2'])) {
        $addQTY2 = 79.99 * $_POST['qty2'];
        echo '<td>' . $_POST['qty2'] . '</td>' . '<td>Razor</td>' . '<td>'. $addQTY2 .'</td>';  
    }
    ?>
    </tr>
    <tr>
    <?php
    if (isset($_POST['qty3']) && !empty($_POST['qty3'])) {
        $addQTY3 = 179.99 * $_POST['qty3'];
        echo '<td>' . $_POST['qty3'] . '</td>' . '<td>WD HD</td>' . '<td>'. $addQTY3 .'</td>';  
    }
    ?>
    </tr>
    <tr>
    <?php
    if (isset($_POST['qty4']) && !empty($_POST['qty4'])) {
        $addQTY4 = 249.99 * $_POST['qty4'];
        echo '<td>' . $_POST['qty4'] . '</td>' . '<td>Google Nexus 7</td>' . '<td>'. $addQTY4 .'</td>';   
    }
    ?>
    </tr>
    <tr>
    <?php
    if (isset($_POST['qty5']) && !empty($_POST['qty5'])) {
        $addQTY5 = 199.99 * $_POST['qty5'];
        echo '<td>' . $_POST['qty5'] . '</td>' . '<td>DD-45</td>' . '<td>'. $addQTY5 .'</td>';
    }
    ?>
    </tr>
<tr>
    <td></td>
    <td>Total</td>
    
    <td><?php echo "$". $addQTY1 + $addQTY2 + $addQTY3 + $addQTY4 + $addQTY5?></td>
</tr>
</tbody>
    </table>
</div>
<?php }?>
</body>
</html>