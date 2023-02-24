<?php 
include ('login_check.php');
include ('header.php');
 include ('config.php');
 

 $msg="";

 $id=$_GET['id'];
 $patient_id=$_GET['patient_id'];

 $fetch_data="SELECT * FROM patient_appointment where patient_id=$patient_id and id=$id";
 $row=mysqli_fetch_assoc(mysqli_query($con,$fetch_data));
 
 
 if($_SERVER['REQUEST_METHOD']=="POST" && isset($_GET['patient_id'] ) && isset($_GET['id'] ))
 {
  $id=$_GET['id'];
 $patient_id=$_GET['patient_id'];
 $symptoms=$_POST['symptoms'];
 $prescribed_medications=$_POST['prescribed_medications'];
 $conclusion=$_POST['conclusion'];
 
 
 $query="UPDATE patient_appointment SET symptoms='$symptoms',prescribed_medications='$prescribed_medications',conclusion='$conclusion' where patient_id=$patient_id and id=$id";
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
                    <input type="textarea" class="form-control" value=<?php echo $row['symptoms']?> name="symptoms" required id="floatingName" placeholder="Your Name"></input>
                    <label for="floatingName">Symptoms</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="prescribed_medications" value="<?php echo $row['prescribed_medications']?>" required id="floatingEmail" placeholder="Your Email"></input>
                    <label for="floatingEmail">prescribed Medications</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="name" class="form-control" required value="<?php echo $row['conclusion']?>" name="conclusion" id="floatingPassword" placeholder="Password"></input>
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