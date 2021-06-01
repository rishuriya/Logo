<?php 
include('security.php');
include('includes/header.php');
include('includes/navwithoutsidebar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
<?php
    if(isset($_POST['search']))
    {
        $name=$_POST['search'];
        
        $query = "SELECT * FROM register WHERE Name='$name' or username='$name' ";
        
        $query_run = mysqli_query($connection,$query);
        
       }

?>
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            
            <th> Username </th>
            <th>Name</th>
            
            
            
          </tr>
        </thead>
        <tbody>
          <?php

          if(mysqli_num_rows($query_run)>0)
          {
            while($row= mysqli_fetch_assoc($query_run))
              { echo 'ma';

                ?>

          <tr>
            <td><?php echo $row ['Id'];?> </td>
            <td><?php echo $row ['username'];?> </td>
            <td><?php echo $row ['Name'];?> </td>
            
             <?php
              } 
          }
          else

          {
            echo "NO RECORD FOUND";
          }

          ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>