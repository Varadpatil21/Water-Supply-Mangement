<?php
if (!isset($_SESSION)) {
    session_start();
}
include('connection.php');

if(isset($_POST['submit']))
{
$vendorname = $_POST['vendor_name'];
$contact = $_POST['contact'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO watersupply.vendor (Name, Contact, Product_ID, Quantity, Price) VALUES ('$vendorname', '$contact', '$product', '$quantity', '$price')";

if ($con->query($sql) === true) {
    $_SESSION['success'] = "Added Success";
    header("Location: vendors.php");
    exit; // Make sure to exit after the header to prevent further script execution
} else {
    echo "Error: " . $con->error;
}

}
$con->close;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vendor</title>
    <link rel="stylesheet" href="CSS/add_vendor.css?v=<?php echo time(); ?>">
</head>
<body>
<form class="form" action="add_vendor.php" method="post">
    <div >
        <input type="text" placeholder="Enter Vendor Name" name="vendor_name">
        <input type="tel" placeholder="Enter Contact No." name="contact">   
        <input type="text" placeholder="Enter Product ID" name="product">
        <input type="number" placeholder="Enter Quantity" name="quantity">
        <input type="number" placeholder="Enter Price" name="price">
        <button id="sub"name="submit">Submit</button>
    </div>
</form>
</body>
</html>