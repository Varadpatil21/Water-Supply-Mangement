<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'connection.php';
$sql = "SELECT * FROM vendor";


$result = $con->query($sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>vendor</title>
    <link rel="stylesheet" href="CSS/vendor_style.css">
</head>
<body>
    <div>
        <div>
            <h1>Vendor</h1>
        </div>
        <div >
            <span class="add_vendor">
            <a class="add_vendor" href="add_vendor.php">
                <h4>+ Add Vendor</h4>
            </a>
            </span>
           
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Vendor Name</th>
                        <th>Contact No</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Contact'] . "</td>";
                        
                        echo "<td>" . $row['Product_ID'] . "</td>";
                        echo "<td>" . $row['Quantity'] . "</td>";
                        echo "<td>" . $row['Price'] . "</td>";
                        echo "<td><a href='edit_vendor.php?id=" . $row['ID'] . "'>Edit</a></td>";
                        echo "</tr>";
                    }
                    ?>
               


                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
