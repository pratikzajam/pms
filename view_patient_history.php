<?php 
include ('login_check.php');
include ('header.php');
 include ('config.php');
 
 



 if(isset($_GET['patient_id']) && ($_GET['type'])) 
 {
  
  $patient_id=$_GET['patient_id'];
  $visit_date=$_GET['visit_date'];
  
  
 
 
 if($type="history")
 {
 
$query= "select patient_appointment.id, patient_info.patient_name,patient_appointment.patient_id,patient_appointment.visit_date,patient_appointment.symptoms,patient_appointment.conclusion from patient_appointment INNER JOIN patient_info ON patient_appointment.patient_id=patient_info.patient_id where patient_info.patient_id=$patient_id";
 $res=mysqli_query($con,$query);
 }

 if($type=="delete")
 {
$patient_id=$_GET['patient_id'];
$delete_query= "delete from patient_appointment where patient_id=$patient_id;";
$delete=mysqli_query($con,$delete_query);
 }

 }
 else{
  $visit_date=
  $query= "select patient_appointment.id, patient_info.patient_name,patient_appointment.patient_id,patient_appointment.visit_date,patient_appointment.symptoms,patient_appointment.conclusion from patient_appointment INNER JOIN patient_info ON patient_appointment.patient_id=patient_info.patient_id";
  $res=mysqli_query($con,$query);

 }

 
 
  
 


?>
<link rel="stylesheet" href="DataTables/datatables.css">
<body>

  <!-- ======= Header ======= -->
  <?php include('navbar.php'); ?>

 <?php include ('sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Patient History</h1>
  <!--    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body" style="overflow-x:auto;">
              <h5 class="card-title"></h5>
              
              <!-- Bordered Table -->
              <table class="table table-bordered "  id="mytable">
                <thead>
                  <tr>
                    <th scope="col">Sr. No </th>
                    <th scope="col">Name</th>
                    <th scope="col">visit date</th>
                    <th scope="col">symptoms</th>
                    <th scope="col">conclusion</th>
                    <th scope="col" width="5%"> Delete</th>
                    <th scope="col" width="5%"> Edit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    while($row=mysqli_fetch_assoc($res))
                    {  ?> 
                  <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $row['patient_name']?></td>
                    <td><?php echo  $row['visit_date']?></td>
                    <td><?php echo $row['symptoms']?></td>
                    <td><?php echo $row['conclusion']?></td>
                    <td><a href="?patient_id=<?php echo $row['patient_id']?>&type=delete">
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </a>
                    </td>
                    <td>
                    <a href="edit_patient_history.php?patient_id=<?php echo $row['patient_id']?>&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-primary btn-sm" >
                      Edit</button>
                    </a>
                  </td>
                  </tr>
                  <?php $i++;} ?>
                  </tbody>
              </table>



  
              <script src="DataTables/datatables.js"></script>
              
              <script>


$(document).ready(function() {
    $('#mytable').DataTable( {
        dom: 'Bfrtip',
        dom: 'lfBrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true,
        
        
        } );
    } );
  </script>

  </main><!-- End #main -->

  <?php 
  
  
  
  
//  select patient_info.patient_name,patient_appointment.patient_id,patient_appointment.visit_date,patient_appointment.symptoms,patient_appointment.conclusion from patient_appointment INNER JOIN patient_info ON patient_appointment.patient_id=patient_info.patient_id;
  
  
  include('footer.php');?>