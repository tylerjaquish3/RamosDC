<?php
session_start();

if (!isset($_SESSION["username"])) {
    header('location:index.html');
}

include 'config/datalogin.php';
include 'config/functions.php';
include 'admin-header.php';

?>

<div id="content">
  <div class="outer text-center">
    <h1><i class="fa fa-user"></i> Users</h1>

    <div class="inner bg-light lter">
      <div class="col-lg-12">
        
        <table id="usersTable">
          <thead>
            <tr>
              <th>ID</th><th>Name</th><th>Last Updated</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT * FROM admin";
          $result = mysqli_query($conn, $sql);
         
          while($row = mysqli_fetch_array($result)) 
          { 
            $id = $row['id'];
            $fullname = $row['fullname'];
            $updatedDate = $row['updated_at'];
            ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $fullname ?></td>
              <td><?php echo $updatedDate ?></td>
            </tr>
          <?php } ?>
          
          </tbody>
          </table>
      </div>
    </div>
    <!-- /.inner -->
  </div>
  <!-- /.outer -->
</div>
<!-- /#content -->
      
<?php
include 'admin-footer.html';
?>  
   
    
