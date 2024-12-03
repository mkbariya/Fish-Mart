<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

include ('config.php');

$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];


$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="fish.jpg" alt="fish"></a>
        <div class="twelve">
            <h1>FishMart</h1>
        </div>
        <div class="group">
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="fishes.html">Fishes</a></li>
                <!-- <li><a href="cart.html"><ion-icon name="cart-outline" class="loginbtn"></ion-icon></a></li> -->
                <!-- <li><a href="profile.php"><ion-icon name="person-outline" class="loginbtn"></ion-icon></a></li> -->
                <!-- <li><a href="logout.php">Logout</a></li> -->
            </ul>
        </div>
    </header>
    <div class="prof-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>User Profile</h3>
                        </div>
                        <div class="card-body">
                            <!-- PHP code to fetch user data -->

                            <div class="container">
                                <div id="photo-preview">
                                    <img id="user-photo" src="placeholder.jpg" 
                                        onclick="document.getElementById('file-input').click()">
                                </div>
                                <div class="upload-text" onclick="document.getElementById('file-input').click()">Click
                                    to Upload Photo</div>
                                <input type="file" id="file-input" accept="image/*" style="display: none;">
                            </div>

                        </div>
                        <div class="text-center mt-3">
                            <h4><?php echo $firstname . ' ' . $lastname; ?></h4>
                            <p>@<?php echo $username; ?></p>
                            <div class="text-center mt-4">
                    <a href="cart.html" class="btn btn-primary">View Cart</a>
                </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <!-- Logout Button -->
                            <form action="logout.php" method="post">
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Cart Button -->
               
            </div>
        </div>
    </div>
    <style>
        .container {
  text-align: center;
}
#photo-preview {
  margin-top: 20px;
}
#photo-preview img {
  border-radius: 50%;
  width: 150px;
  height: 150px;
  object-fit: cover;
  border: 2px solid #007bff;
  cursor: pointer;
}
#photo-preview img:hover {
  opacity: 0.8;
}
.upload-text {
  margin-top: 10px;
  color: #007bff;
  font-weight: bold;
  cursor: pointer;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    margin-bottom: 18px;
}
.offset-md-3 {
        margin-left: 25%;
        margin-top: -27px;
    }

    </style>
    <script>
        document.getElementById('file-input').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const image = document.getElementById('user-photo');
                    image.src = e.target.result;
                    image.onload = function () {
                        localStorage.setItem('userPhoto', e.target.result);
                    }
                    document.querySelector('.upload-text').style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });

        // Load image from localStorage if exists
        window.onload = function () {
            const userPhoto = localStorage.getItem('userPhoto');
            if (userPhoto) {
                const image = document.getElementById('user-photo');    
                image.src = userPhoto;
                document.querySelector('.upload-text').style.display = 'none';
            }
        }
    </script>
</body>

</html>