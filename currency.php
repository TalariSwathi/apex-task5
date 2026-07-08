<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

$apiKey = "a5a226d293a79ef0a726ed4d";

$url = "https://v6.exchangerate-api.com/v6/$apiKey/latest/USD";

$response = file_get_contents($url);

if($response === FALSE)
{
    die("Unable to connect to the ExchangeRate API.");
}

$data = json_decode($response, true);

$inr = "Not Available";

if(isset($data['conversion_rates']['INR']))
{
    $inr = $data['conversion_rates']['INR'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Currency Exchange</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Currency Exchange Rate</h2>

    <p style="text-align:center; font-size:22px;">
        <strong>1 USD = ₹ <?php echo $inr; ?></strong>
    </p>

    <br>

    <button onclick="window.location.href='dashboard.php'">
        ⬅ Back to Dashboard
    </button>

</div>

</body>
</html>