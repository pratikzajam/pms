<?php 
include ('login_check.php');
include ('header.php');
 include ('config.php');
 
 


 if(isset($_GET['patient_id']) && ($_GET['type']))
 {
  
  $patient_id=$_GET['patient_id'];
  $type=$_GET['type'];
 
 if($type="delete")
 {
 
$query="DELETE FROM patient_info WHERE patient_id=$patient_id";
 $res=mysqli_query($con,$query);
 }
   
  }

  $query="SELECT * FROM patient_info";
 $res=mysqli_query($con,$query);



?>
<link rel="stylesheet" href="DataTables/datatables.css">
<body>


  <?php include('navbar.php'); ?>
 <?php include ('sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registered Patients</h1>
  <!--    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body" >
              <h5 class="card-title"></h5>
              
              <!-- Bordered Table -->
              <table class="table table-bordered " id="mytable">
                <thead>
                  <tr>
                    <th scope="col" width="5%">Sr. No </th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">city</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Previous Ailments</th>
                    <th scope="col" width="5%">delete</th>
                    <th scope="col" width="5%">Edit</th>
                    <th scope="col" width="10%">Add appointment</th>
                    <th scope="col" width="10%">View history</th>
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
                    <td><?php echo $row['patient_number']?></td>
                    <td><?php echo $row['patient_age']?></td>
                    <td><?php echo $row['patient_Address']?></td>
                    <td><?php echo $row['patient_city']?></td>
                    <td><?php echo $row['patient_blood_group']?></td>
                    <td><?php echo $row['patient_previous_ailments']?></td>
                    <td><a href="?patient_id=<?php echo $row['patient_id']?>&type=delete">
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </a>
                    </td>
                   <td>
                    <a href="edit_patient_info.php?patient_id=<?php echo $row['patient_id']?>"><button type="button" class="btn btn-primary btn-sm" >
                      Edit</button>
                    </a>
                    </td>
                    <td>
                    <a href="add_appointment.php?patient_id=<?php echo $row['patient_id']?>"><button type="button" class="btn btn-info btn-sm" >
                      Add appointment</button>
                    </a>
                    </td>
                    <td>
                    <a href="view_patient_history.php?patient_id=<?php echo $row['patient_id']?>&type=history"><button type="button" class="btn btn-success btn-sm" >
                      View History</button>
                    </a>
                    </td>
                  </tr>
                  <?php $i++;} ?>
                  </tbody>
              </table>



  
              <script src="DataTables/datatables.js"></script>
              
              <script>


 

//datatable code to print table and make it responsive
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

  <style>
    .dataTables_wrapper .dt-buttons {
  float:none;  
  text-align:center;
}
  </style>

  </main><!-- End #main -->


  <?php include('footer.php');
  
  
  

  
  ?>