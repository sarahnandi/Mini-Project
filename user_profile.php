<?php
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: login.html"); 
    exit();
}

// Get user data
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Indian Bank</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <header class="navbar">
        <div class="bank-name">Indian Bank</div>
        <nav>
            <ul>
                <li><a href="user_profile.php">Home</a></li>
                <li><a href="#">About Us</a></li> 
                <li><a href="#">Others</a></li> 
            </ul>
        </nav>
    </header>

    <main class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['Name']); ?></h1>
        <p>Account Number: <?php echo htmlspecialchars($user['Account_number']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['Email']); ?></p>
        <p>Balance: ₹50,000.00</p>

        <div class="options-container">
            <a href="dashboard.html">
                <div class="option">
                    <h2>Transaction History</h2>
                    <p>View your past transactions.</p>
                </div>
            </a>
            <a href="online_payment.html">
                <div class="option">
                    <h2>Online Payment</h2>
                    <p>Make payments directly from your account.</p>
                </div>
            </a>
            <a href="net_banking.html">
                <div class="option">
                    <h2>Net Banking</h2>
                    <p>Access your banking services online.</p>
                </div>
            </a>
            <a href="insurance.html">
                <div class="option">
                    <h2>Insurance</h2>
                    <p>Manage your insurance policies.</p>
                </div>
            </a>
        </div>
    </main>
</body>
</html>
