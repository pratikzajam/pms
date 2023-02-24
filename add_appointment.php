<?php 

include ('header.php');
 include ('config.php');
 include ('login_check.php');

 $msg="";

 if($_SERVER['REQUEST_METHOD']=="POST" && isset($_GET['patient_id']))
 {
 $patient_id=$_GET['patient_id'];
 $symptoms=$_POST['symptoms'];
 $prescribed_medications=$_POST['prescribed_medications'];
 $conclusion=$_POST['conclusion'];
 
 
 $query="INSERT INTO patient_appointment(patient_id,symptoms,prescribed_medications,conclusion) VALUES('$patient_id','$symptoms','$prescribed_medications','$conclusion')";
 echo $query;
 $res=mysqli_query($con,$query);
 
 
 }

?>

<body>

  <!-- ======= Header ======= -->
  <?php include('navbar.php'); ?>
 <?php include('sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Appointment</h1>
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
              <form class="row g-3"  method="POST">
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea type="textarea" class="form-control" name="symptoms" required id="floatingName" placeholder="Your Name"></textarea>
                    <label for="floatingName">Symptoms</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea type="number" class="form-control" name="prescribed_medications" required id="floatingEmail" placeholder="Your Email"></textarea>
                    <label for="floatingEmail">prescribed Medications</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea type="name" class="form-control" required name="conclusion" id="floatingPassword" placeholder="Password"></textarea>
                    <label for="floatingPassword">conclusion</label>
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