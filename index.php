<?php session_start();?>
<?php include ('header.php');
 include ('config.php');
 
 if(!isset($_SESSION['islogin']))
 {
     header('Location:login.php');
 }

 $msg="";

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
 $name=$_POST['patient_name'];
 $number=$_POST['patient_number'];
 $age=$_POST['patient_age'];
 $address=$_POST['patient_address'];
 $city=$_POST['patient_city'];
 $blood_group=$_POST['patient_blood_group'];
 $previous_ailments=$_POST['patient_previous_ailments'];
 
 $query="INSERT INTO patient_info(patient_name,patient_number,patient_age,patient_address,patient_city,patient_blood_group,patient_previous_ailments) VALUES('$name',$number,$age,'$address','$city','$blood_group','$previous_ailments')";
 
 $patient_check="SELECT * From patient_info WHERE patient_name='$name' and patient_number=$number";
 
 
 $res=mysqli_query($con,$patient_check);
 
 if(mysqli_num_rows($res)>0)
 {
 $msg="Patient record allready exists";

 }
 else{
 mysqli_query($con,$query);
 
 header("location:registered_patients.php");
 
 }
 }

?>

<body>

 <?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register a Patient</h1>
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
              <form class="row g-3" action="index.php" method="POST" id='mytable'>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="patient_name" required id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Patient Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="patient_number" required id="floatingEmail" placeholder="Your Email">
                    <label for="floatingEmail">Phone Number</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="name" class="form-control" required name="patient_age" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Age</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" required placeholder="Address" name="patient_address" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Address</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="patient_city" id="floatingCity" placeholder="City">
                      <label for="floatingCity">City</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="patient_blood_group" aria-label="State" required>
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
                    <input type="text" required name="patient_previous_ailments" class="form-control" id="floatingZip" placeholder="Zip">
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