<?php
session_start();

if (!isset($_SESSION["username"])) {
    header('location:index.html');
}

include 'config/datalogin.php';
include 'config/functions.php';
include 'config/process-forms.php';
include 'admin-header.php';

?>

<div id="content">
  <div class="outer text-center">
    <h1><i class="fa fa-pencil-square-o"></i> General Content</h1>
    <p>Expand the item, make your changes, and be sure to save!</p>

    <div class="inner bg-light lter">
      <div class="col-lg-12">
        <?php if (isset($mysqlResult)) { ?>
          <div class="row">
            <div class="col-sm-6 col-sm-push-3 text-center banner-msg">
              <?php echo $mysqlResult; ?>
            </div>
          </div>

        <?php } 

        $content = ['mission', 'what we do', 'how we do it', 'background'];
        $sql = "SELECT * FROM content where identifier IN ('".implode("','",$content)."')";
        $result = mysqli_query($conn, $sql);
       
        while($row = mysqli_fetch_array($result)) 
        { 
          $id = $row['id'];
          $context = $row['identifier'];
          $content = $row['content_text'];

          ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <header>
                  <div class="icons"><i class="fa fa-th-large"></i></div>
                  <h5><?php echo $context; ?></h5>
                  <div class="toolbar">
                    <nav style="padding: 8px;">
                        <a onclick="toggleContent('#<?php echo $id ?>');" class="btn btn-default btn-xs collapse-box">
                            <i class="fa fa-plus"></i>
                        </a>
                    </nav>
                  </div>
                </header>

                <div class="body" id="<?php echo $id ?>" style="display:none;">
                    <form action="" method="post" enctype="multipart/form-data">
                      <?php echo "<textarea id='ckeditor' class='ckeditor' name='content_text[".$id."]'>" . $content . '</textarea>'; 
                      echo "<input type='hidden' name='table' value='content'>"; ?>
                        
                        <div class="form-actions no-margin-bottom" id="cleditorForm">
                            <input type="submit" value="Save" class="btn btn-primary" name="change-content">
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        <?php } ?>

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
   
    
