<!DOCTYPE html>
<html lang="en">

<head>
  <title>Watercare - raise funds to stop water scarcity in tunisia</title>


  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link + icons link
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" >
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
    rel="stylesheet">
</head>

<body>
<?php
session_start(); // Start the session

    if (isset($_POST["con1"])) {
        $email = $_POST['email'] ;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "watercareproject";
        
            try {
              // Create a new PDO instance
              $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        
              // Set PDO error mode to exception
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Retrieve the new donation amounts from the form inputs
    $donatedAmount1 = isset($_POST['option1']) ? intval($_POST['DonatedAmount1']) : 0;
    $donatedAmount2 = isset($_POST['option2']) ? intval($_POST['DonatedAmount2']) : 0;
    $donatedAmount3 = isset($_POST['option3']) ? intval($_POST['DonatedAmount3']) : 0;
    $donatedAmount4 = isset($_POST['option4']) ? intval($_POST['DonatedAmount4']) : 0;

    // Update the client table with the new donation amounts
    $updateQuery = "UPDATE client SET `Harvest Rainwater` = `Harvest Rainwater` + :newAmount1, `Conserve Water` = `Conserve Water` + :newAmount2, `Desalination` = `Desalination` + :newAmount3, `Reuse Wastewater` = `Reuse Wastewater` + :newAmount4 WHERE email = :email";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindValue(':newAmount1', $donatedAmount1);
    $updateStmt->bindValue(':newAmount2', $donatedAmount2);
    $updateStmt->bindValue(':newAmount3', $donatedAmount3);
    $updateStmt->bindValue(':newAmount4', $donatedAmount4);
    $updateStmt->bindValue(':email', $email);
    $updateStmt->execute();
    

    echo "Donation information updated successfully.";
    }
    catch (PDOException $e) {
        echo "Error updating donation information: " . $e->getMessage();
    }
}
}
  ?>
</body>