<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            transition: margin-left 0.3s ease;
        }
        .left-panel {
            width: 200px;
            background-color: rgb(125, 125, 235); /* Left panel background color */
            padding: 20px;
            border-right: 1px solid #ccc;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: block;
            padding-top: 60px; /* Adds space between button and list */
        }
        .left-panel a {
            display: block;
            padding: 10px 0;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        .left-panel a:hover {
            background-color: #ddd;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            text-align: center;
            margin-left: 220px; /* Offset the content to the right */
        }
        .user-name {
            font-size: 50px;
            font-weight: bold;
        }
        .user-heading {
            background-color: rgb(125, 125, 235); /* Heading background color */
            color: white;
            padding: 15px;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        .toggle-button {
            position: fixed;
            left: 10px;
            top: 10px;
            background-color: rgb(125, 125, 235); /* Button background color */
            color: white;
            padding: 10px;
            border: none;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
            border-radius: 5px; /* Optional: makes button corners rounded */
        }
        .toggle-button:hover {
            background-color: rgb(100, 100, 210); /* Darker shade on hover */
        }
        .left-panel.closed {
            display: none;
        }
        .main-content.open-panel {
            margin-left: 0; /* Remove offset when panel is closed */
        }

        /* Styling for the donation campaigns and progress bars */
        .campaign-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .campaign {
            width: 48%;
            margin-bottom: 20px;
            padding: 15px;
            background-color: rgb(240, 240, 240);
            border-radius: 8px;
        }
        .campaign h3 {
            color: rgb(125, 125, 235);
        }
        .progress-bar {
            width: 100%;
            background-color: #ddd;
            border-radius: 10px;
            height: 20px;
        }
        .progress-bar div {
            height: 100%;
            border-radius: 10px;
            text-align: center;
            color: white;
            line-height: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Toggle Button -->
    <button class="toggle-button" onclick="togglePanel()">☰</button>

    <!-- Left Panel -->
    <div class="left-panel">
        <a href="home.php">HOME</a>
        <a href="my_donations.php">MY DONATION</a>
        <a href="profile.php">PROFILE</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- User Name Heading -->
        <div class="user-heading">
            Hello  <?php 
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                while($row = mysqli_fetch_array($query)){
                    echo $row['firstName'].' '.$row['lastName'];
                }
            }
            ?>
            :)
        </div>
        <a href="logout.php">Logout</a>

        <!-- Donation Campaigns with Progress Bars -->
        <div class="campaign-container">
            <!-- Campaign 1 -->
            <div class="campaign">
                <h3>Campaign 1: Education Fund</h3>
                <div class="progress-bar">
                    <div style="width: 60%; background-color: rgb(125, 125, 235);">60%</div>
                </div>
            </div>

            <!-- Campaign 2 -->
            <div class="campaign">
                <h3>Campaign 2: Medical Support</h3>
                <div class="progress-bar">
                    <div style="width: 40%; background-color: rgb(125, 125, 235);">40%</div>
                </div>
            </div>

            <!-- Campaign 3 -->
            <div class="campaign">
                <h3>Campaign 3: Animal Shelter</h3>
                <div class="progress-bar">
                    <div style="width: 80%; background-color: rgb(125, 125, 235);">80%</div>
                </div>
            </div>

            <!-- Campaign 4 -->
            <div class="campaign">
                <h3>Campaign 4: Disaster Relief</h3>
                <div class="progress-bar">
                    <div style="width: 20%; background-color: rgb(125, 125, 235);">20%</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePanel() {
            const panel = document.querySelector('.left-panel');
            const content = document.querySelector('.main-content');
            panel.classList.toggle('closed');
            content.classList.toggle('open-panel');
        }
    </script>

</body>
</html>
