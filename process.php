<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
if (isset($_POST["con"])) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "watercareproject";

    try {

        
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $fullName = $_POST['FullName'];
        $email = $_POST['Email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $phone = intval($_POST['phone']);
        $donationMethod = $_POST['options'];
        $card = $_POST['card'];
        $nameOnCard = $_POST['NameOnCard'];
        $creditCardNumber = intval($_POST['CreditCardNumber']);
        $message = $_POST['message'];

        $donatedAmount1 = isset($_POST['option1']) ? intval($_POST['DonatedAmount1']) : 0;
        $donatedAmount2 = isset($_POST['option2']) ? intval($_POST['DonatedAmount2']) : 0;
        $donatedAmount3 = isset($_POST['option3']) ? intval($_POST['DonatedAmount3']) : 0;
        $donatedAmount4 = isset($_POST['option4']) ? intval($_POST['DonatedAmount4']) : 0;
        
        $incrementAmount1 = $donatedAmount1;
        $incrementAmount2 = $donatedAmount2;
        $incrementAmount3 = $donatedAmount3;
        $incrementAmount4 = $donatedAmount4;

        $updateQuery = "UPDATE donation_totals SET 
                        amount1 = amount1 + :incrementAmount1, 
                        amount2 = amount2 + :incrementAmount2, 
                        amount3 = amount3 + :incrementAmount3, 
                        amount4 = amount4 + :incrementAmount4";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':incrementAmount1', $incrementAmount1);
        $stmt->bindParam(':incrementAmount2', $incrementAmount2);
        $stmt->bindParam(':incrementAmount3', $incrementAmount3);
        $stmt->bindParam(':incrementAmount4', $incrementAmount4);
        $stmt->execute();


        $query = "INSERT INTO client VALUES ('$fullName', '$email','$password', '$address', '$city', '$state', $phone, '$donationMethod', '$card', '$nameOnCard', $creditCardNumber, $donatedAmount1, $donatedAmount2, $donatedAmount3, $donatedAmount4, '$message')";
        $result = $pdo->exec($query);
        $query1 = "INSERT INTO users VALUES ('$fullName', '$email','$password', '$address', '$city', '$state', $phone)";
        $result1 = $pdo->exec($query1);



        if ($result !== false) {
            echo "Data inserted into the table successfully.";
        } else {
            echo "Error inserting data into the table.";
        }
    } catch (PDOException $e) {
        echo "Error inserting data into the table: " . $e->getMessage();
    }
}
?>




    </body>
</html>