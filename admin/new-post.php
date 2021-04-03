<?php

ob_start();
require_once "functions/db.php";

// Initialize the session

session_start();

// If session variable is not set it will redirect to login page

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {

    header("location: login.php");

    exit;
}

$email = $_SESSION['email'];

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
    <!-- Wizard CSS -->
    <link href="../plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
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
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><img src="../plugins/images/icon.png" style="width: 30px; height: 30px;" alt="home" /></b><span class="hidden-xs"><b>GCA</b></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">

                    <!-- /.dropdown -->



                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> Account<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="settings.php"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="functions/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="index.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                    </li>


                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Messages<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="new-post.php">Add Messages</a></li>
                        </ul>
                    </li>







                    <li><a href="functions/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>

                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $email; ?></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Posts</a></li>
                            <li class="active">New</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Create New Message</h3>
                            <p class="text-muted m-b-30 font-13"> A Message contains the Message Image, Subject and its Message Body .</p>
                            <div id="exampleValidator" class="wizard">
                                <ul class="wizard-steps" role="tablist">
                                    <li class="active" role="tab">
                                        <h4><span><i class="ti-user"></i></span>Message Image</h4>
                                    </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-marker-alt"></i></span>Subject</h4>
                                    </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-book"></i></span>Message Body</h4>
                                    </li>
                                </ul>
                                <form id="validation" class="form-horizontal" action="functions/new_post.php" method="post">
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" role="tabpanel">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Message Image</label>
                                                <div class="col-xs-5">
                                                    <input type="file" class="form-control" name="" id="file" required />
                                                    <input type="hidden" class="form-control" name="message_image" id="message_image" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Subject</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="subject" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Message Body </label>
                                                <div class="col-xs-5">
                                                    <textarea class="form-control" name="message_body" required> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="addMessage" class="btn btn-outline">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" checked="" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br />
                                <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2021 &copy; Google Cloud Assignment </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- /#wrapper -->
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
    <!-- Form Wizard JavaScript -->
    <script src="../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
    <!-- FormValidation -->
    <link rel="stylesheet" href="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
    <script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->

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
    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
        (function() {
            $('#exampleBasic').wizard({
                onFinish: function() {
                    alert('finish');
                }
            });
            $('#exampleBasic2').wizard({
                onFinish: function() {
                    alert('finish');
                }
            });
            $('#exampleValidator').wizard({
                onInit: function() {
                    $('#validation').formValidation({
                        framework: 'bootstrap',
                        fields: {
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required'
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 30,
                                        message: 'The username must be more than 6 and less than 30 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9_\.]+$/,
                                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required'
                                    },
                                    emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    },
                                    different: {
                                        field: 'username',
                                        message: 'The password cannot be the same as username'
                                    }
                                }
                            }
                        }
                    });
                },
                validator: function() {
                    var fv = $('#validation').data('formValidation');
                    var $this = $(this);
                    // Validate the container
                    fv.validateContainer($this);
                    var isValidStep = fv.isValidContainer($this);
                    if (isValidStep === false || isValidStep === null) {
                        return false;
                    }
                    return true;
                },
                onFinish: function() {
                    $.post("keep.php", $("#validation").serialize()).done(function() {
                        alert("hiiii");
                    });
                }
            });
            $('#accordion').wizard({
                step: '[data-toggle="collapse"]',
                buttonsAppendTo: '.panel-collapse',
                templates: {
                    buttons: function() {
                        var options = this.options;
                        return '<div class="panel-footer"><ul class="pager">' + '<li class="previous">' + '<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' + '</li>' + '<li class="next">' + '<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' + '<a href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' + '</li>' + '</ul></div>';
                    }
                },
                onBeforeShow: function(step) {
                    step.$pane.collapse('show');
                },
                onBeforeHide: function(step) {
                    step.$pane.collapse('hide');
                },
                onFinish: function() {
                    alert('finish');
                }
            });
        })();
        var selectedFile;


        $("#file").on('change', function(e) {

            selectedFile = e.target.files[0];
            console.log(selectedFile.name);
            uploadFile();

        });

        function uploadFile() {

            var storageRef = firebase.storage().ref('/messages' + selectedFile.name);
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
                        $('#message_image').val(downloadURL);
                        console.log($("#message_image").val());


                    });
                }
            );


        }
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>