<?php
require_once "config.php";
$sql = "SELECT user_id,username FROM User;";
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->bind_result($user_id, $username);
$users = array();
  while($stmt->fetch()){
                $users[] = array("user_id" => $user_id, "username" => $username);
            }

$test = var_dump($users);
echo "<script>console.log($test)</script>";
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Users</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .picture-list {
                overflow-y: scroll;
                max-height: 625px;
                border: 5px solid white;
            }
            .picture-list li {
                display: inline-block;
                padding: 15px;
                margin-right: 75px;
                margin-left: 100px;
                text-align: center;
                vertical-align: top;
                width: 400px;
            }
            .picture-list li p {
                margin-top: 1%;
                color: white;
            }
            .picture-list li img {
                width: 250px;
            }
            .picture-list li div {
                margin-bottom: 5%;
            }
        </style>
    </head>
    <body>
        <!-- Begin navigation bar. -->
        <h1 class="header">My Game Tracker</h1>
        <div class="header">
            <ul class="left_nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="mylist.php">My List</a></li>
                <li><a href="achievements.html">Achievements</a></li>
                <li><a href="recommended.html">Recommended</a></li>
                <li><a href="users.html" style="border:2px solid white"><b>Users</b></a></li>
            </ul>
            <span class="logo" style="width: 30vw;"></span>
            <ul class="right_nav">
                <li>
                </li>
                <li>
                    <form>
                        <span>
                            <input type="text" placeholder="Search...">
                            <button type="submit">Go</button>
                        </span>
                    </form>
                </li>
                <li><a href="loginlogout.php">Login</a></li>
            </ul>
        </div>
        <!-- End Navigation bar -->
        <!-- Begin Page Body -->

        <div class="main">
            <!-- Populate webpage body here -->
			 <h1 style="text-align: center;">Find A User</h1>
            <hr>
            <br>
                <form>
                    <span>
                        <input type="text" placeholder="Search username...">
                        <button type="submit">Go</button>
                    </span>
                </form>
            <br>

            <h2>Search Results:</h2>
            <div class="right_nav">
                <select class="right_nav" name="Sort">
                    <option value="A-Z">Sort By: A-Z</option>
                    <option value="Z-A">Sort By: Z-A</option>
                </select>
            </div>
            <div class="picture-list">
                <ul id="picture-ul">
                <?php
                    //foreach ($users as $key => $value) {
                    //echo "<li> $user['username'] </li>";
                    //}
                ?>
                </ul>
            </div>
        </div>
    </body>
</html>

