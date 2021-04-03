<?php
include("includes/db.php");

use Kreait\Firebase\Exception\FirebaseException;

$error = "";
if (isset($_POST['register'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $profilePic = $_POST['profilePic'];
    try {
        $auth = $firebase->getAuth();
        $user = $auth->createUserWithEmailAndPassword($email, $pass);
        if ($user) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['user'] = $user;


            $data = [
                'password' => $pass,
                'profilePic' => $profilePic,


            ];

            $ref = "userDetails/";
            $pushData = $database->getReference($ref)->push($data);
            header("Location:../index.php");
            header("Location:index.php");
        }
    } catch (FirebaseException $e) {

        $error = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon.png">
    <title>Google Cloud Assignment</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h3 class="box-title m-b-20">Sign Up</h3>

                    <p style="color:red;"> <?php echo $error; ?> </p>
                    <label for="Profile Picture">Profile Picture</label>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="file" id="file" required>
                            <input class="form-control" type="text" name="profilePic" id="profilePic" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="usename" required placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="register" name="register">Register</button>
                        </div>
                    </div>
                    <p>Already have an account?</p>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <a class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" href="login.php" name="submit">Log In</a>
                        </div>
                    </div>


                </form>
                <!--  <form class="form-horizontal" id="recoverform" action="index.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>


    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>


    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-storage.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyCnptjMFGI56buFZGs5xicH_j88JWJ1PHY",
            authDomain: "cloud-assignment-php.firebaseapp.com",
            databaseURL: "https://cloud-assignment-php-default-rtdb.firebaseio.com",
            projectId: "cloud-assignment-php",
            storageBucket: "cloud-assignment-php.appspot.com",
            messagingSenderId: "163666987680",
            appId: "1:163666987680:web:1cd198099b43411282d7c5",
            measurementId: "G-PGNZT8YNNS"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>


    <script>
        var selectedFile;


        $("#file").on('change', function(e) {

            selectedFile = e.target.files[0];
            console.log(selectedFile.name);
            uploadFile();

        });

        function uploadFile() {

            var storageRef = firebase.storage().ref('/users' + selectedFile.name);
            var uploadTask = storageRef.put(selectedFile);

            uploadTask.on('state_changed',
                (snapshot) => {
                    // Observe state change events such as progress, pause, and resume
                    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    console.log('Upload is ' + progress + '% done');
                    switch (snapshot.state) {
                        case firebase.storage.TaskState.PAUSED: // or 'paused'
                            console.log('Upload is paused');
                            break;
                        case firebase.storage.TaskState.RUNNING: // or 'running'
                            console.log('Upload is running');
                            break;
                    }
                },
                (error) => {
                    // Handle unsuccessful uploads

                },
                () => {
                    // Handle successful uploads on complete
                    // For instance, get the download URL: https://firebasestorage.googleapis.com/...
                    uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                        console.log('File available at', downloadURL);
                        $('#profilePic').val(downloadURL);
                        console.log($("#profilePic").val());


                    });
                }
            );


        }
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>