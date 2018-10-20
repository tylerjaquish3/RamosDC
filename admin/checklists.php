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
        <h1><i class="fa fa-check-square-o"></i> Checklists</h1>
        <p>Expand the item, make your changes, and be sure to save!</p>

        <div class="inner bg-light lter">
            <div class="col-lg-12">
                <?php if (isset($mysqlResult)) { ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-push-3 text-center banner-msg">
                            <?php echo $mysqlResult; ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="box dark">
                            <header>
                                <div class="icons"><i class="fa fa-edit"></i></div>
                                <h5>Background</h5>
                                <!-- .toolbar -->
                                <div class="toolbar">
                                    <nav style="padding: 8px;">
                                        <a onclick="toggleContent('#bglist');" class="btn btn-default btn-xs collapse-box">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </nav>
                                </div>            
                                <!-- /.toolbar -->
                            </header>
                            <div id="bglist" class="body" style="display:none">
                                <form class="form-horizontal" action="" method="post">

                                    <?php                          
                                    $sql = "SELECT * FROM background_checklist";
                                    $result = mysqli_query($conn, $sql);
                                   
                                    while($row = mysqli_fetch_array($result)) 
                                    { 
                                        $id = $row['id'];
                                        $content = $row['content_text'];

                                    ?>
                  
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input type="text" id="text2" name="content_text[<?php echo $id; ?>]" value="<?php echo $content; ?>" class="form-control">
                                            </div>
                                        </div>
                                            <!-- /.form-group -->
                                    <?php } ?>

                        
                                    <?php echo "<input type='hidden' name='table' value='background_checklist'>"; ?>
                                
                                    <div class="form-actions no-margin-bottom" id="cleditorForm">
                                        <input type="submit" value="Save" class="btn btn-primary" name="change-checklists">
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                        <div class="box dark">
                            <header>
                                <div class="icons"><i class="fa fa-edit"></i></div>
                                <h5>What We Do</h5>
                                <!-- .toolbar -->
                                <div class="toolbar">
                                    <nav style="padding: 8px;">
                                        <a onclick="toggleContent('#wwdlist');"  class="btn btn-default btn-xs collapse-box">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </nav>
                                </div>            
                                <!-- /.toolbar -->
                            </header>
                            <div id="wwdlist" class="body" style="display:none">
                                <form class="form-horizontal" action="" method="post">

                                    <?php                          
                                    $sql = "SELECT * FROM what_we_do_checklist";
                                    $result = mysqli_query($conn, $sql);
                                   
                                    while($row = mysqli_fetch_array($result)) 
                                    { 
                                        $id = $row['id'];
                                        $content = $row['content_text'];

                                    ?>
                  
                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <input type="text" id="text2" name="content_text[<?php echo $id; ?>]" value="<?php echo $content; ?>" class="form-control">
                                            </div>
                                        </div>
                                            <!-- /.form-group -->
                                    <?php } ?>

                        
                                    <?php echo "<input type='hidden' name='table' value='what_we_do_checklist'>"; ?>
                                
                                    <div class="form-actions no-margin-bottom" id="cleditorForm">
                                        <input type="submit" value="Save" class="btn btn-primary" name="change-checklists">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->

</div>


<?php
include 'admin-footer.html';
?>  
   
