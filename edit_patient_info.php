<?php include ('header.php');
 include ('config.php');
 

 $msg="";

 $patient_id=$_GET['patient_id'];

$fetch_data="SELECT * FROM patient_appointment WHERE patient_id=$patient_id";

$row=mysqli_fetch_assoc(mysqli_query($con,$fetch_data));


 

 if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['patient_id'])
 {
    
 $patient_id=$_GET['patient_id'];

$visit_date=$_POST['visit_date'];
 $symptoms=$_POST['symptoms'];
 $prescribed_medication=$_POST['prescribed_medications'];
 $conclusion=$_POST['conclusion'];
 
 
 $query="UPDATE patient_info SET visit_date='$visit_date',symptoms=$symptoms,prescribed_medication=$prescribed_medication,conclusion='$conclusion' WHERE patient_id=$patient_id";


 mysqli_query($con,$query);

 header("location:registered_patients.php");
 
 
 }
 

?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

 <?php include('sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Patient Info</h1>
  <!--    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title text-danger"><?php echo $msg ;?></h5>

              <!-- Floating Labels Form -->
              <form class="row g-3"  method="POST" id='mytable'>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="patient_name" value=<?php echo $row['patient_name']?> required id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Patient Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" value=<?php echo $row['patient_number']?> name="patient_number" required id="floatingEmail" placeholder="Your Email">
                    <label for="floatingEmail">Phone Number</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="name" class="form-control" required name="patient_age" value=<?php echo $row['patient_age']?> id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Age</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type=text class="form-control" required placeholder="Address" value=<?php echo $row['patient_Address']?> name="patient_address" id="floatingTextarea" style="height: 100px;">
                    <label for="floatingTextarea">Address</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" value=<?php echo $row['patient_city']?> name="patient_city" id="floatingCity" placeholder="City">
                      <label for="floatingCity">City</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" value=<?php echo $row['patient_blood_group']?> name="patient_blood_group" aria-label="State" required>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="o-">o-</option>
                      <option value="o+">o+</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                     </select>
                    <label for="floatingSelect">Blood Group</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" required name="patient_previous_ailments" value=<?php echo $row['patient_previous_ailments']?> class="form-control" id="floatingZip" placeholder="Zip">
                    <label for="floatingZip">Prevoius Ailments</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
    </section>

  </main><!-- End #main -->
 

  <?php include('footer.php');?>