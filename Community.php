<?php
include('security.php');
include('includes/header.php');
include('includes/navwithoutsidebar.php');
?>

<?php
    
    $con = mysqli_connect('localhost','root','','nischay_userdata');
    $con1 = mysqli_connect('localhost','root','','post');
	$table=$_SESSION['username'];

    $id=$_SESSION['id'];
    
    $query="Select * from register where Id=$id";
    $query1="Select * from user_post order by time desc";
    $query_run=mysqli_query($con,$query);
    $query_run1=mysqli_query($con1,$query1);

?>

<?php
  if(mysqli_num_rows($query_run)>0)
          {
            ($row= mysqli_fetch_assoc($query_run))
              

                ?>

<section ui-view="" autoscroll="false" ng-class="app.viewAnimation" class="ng-scope container ng-fadeInLeftShort" style=""><!-- uiView:  --><div ui-view="" class="ng-fadeInLeftShort ng-scope">
<div class="container-overlap bg-indigo-500 ng-scope">
  <div class="media m0 pv">
    <div class="media-left"><a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="User" class="media-object img-circle thumb64"></a></div>
    <div class="media-body media-middle">
      <h4 class="media-heading text-white"><?php echo $row['Name'];?></h4>
      <span class="text-white"><?php echo $row['about'];?></span>
    </div>
  </div>
  
</div>
<?php
          }
          else
          {
            echo 'plz try later';
          }
          ?>
<div class="container-lg ng-scope">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <form action="code.php" method='post' enctype='multipart/form-data' class="mt ng-pristine ng-valid">
          <div class="form-group ">
          <textarea rows="1" name='caption' placeholder='What`s on your mind??'  aria-multiline="true" tabindex="0" aria-invalid="false" class="form-control"></textarea>
          <button type="submit" name='postbtn' class="btn btn-outline-success"  style="float:right; position=inline-block;">
                    Save
                </button>
            <div class="image-upload">
              <label for="file-input">
              <i class="fas fa-camera fa-3x"></i>
            </label>

            <input id="file-input" name='file' type="file"/>
            </div>
            </div>
                  
          </form>
        </div>

        <?php
          if(mysqli_num_rows($query_run1)>0)
          {
            while($row1= mysqli_fetch_assoc($query_run1))
              {

                ?>

        <div class="card-body">
          <!-- Inner card-->
          <div class="card">
            <div class="card-heading">
              <div class="media m0">
                <div class="media-left"><a href="<?php echo $row1['id'];?>"><img src="https://bootdey.com/img/Content/avatar/avatar6.png " alt="User" class="media-object img-circle thumb48"></a></div>
                <div class='media-right'><i class="fal fa-ellipsis-h-alt"></i></div>
                <div class="media-body media-middle pt-sm">
                  <p class="media-heading m0 text-bold"><?php echo $row1['name'];?></p><small class="text-muted"><em class="ion-earth text-muted mr-sm"></em><span><?php echo $row1['time'];?></span></small>
                </div>
                <div class='media-right'>
                  
                  </div>
              </div>
              <div class="card-item"><img src="<?php echo $row1['file'];?>" onerror="this.style.display='none'" alt="MaterialImg" class="fw img-responsive"></div>
              <div class="p"> <p style='float:center;'><?php echo $row1['caption'];?></p></div>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-flat btn-primary">Like</button>
              <button type="button" class="btn btn-flat btn-primary">Share</button>
              <button type="button" class="btn btn-flat btn-primary">Comment</button>
            </div>
          </div>
        </div>
        <?php
              }
          }
          else
          {
            echo 'Find Friends';
          }
          ?>

      </div>
    </div>
    <div class="col-md-4">
      <div class="push-down"></div>
      <div class="card card-transparent">
        <h5 class="card-heading">Friends</h5>
        <div class="mda-list">
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Eric Graves</a></h3>
              <div class="text-muted text-ellipsis">Ut ac nisi id mauris</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Bruce Ramos</a></h3>
              <div class="text-muted text-ellipsis">Sed lacus nisl luctus</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Marie Hall</a></h3>
              <div class="text-muted text-ellipsis">Donec congue sagittis mi</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Russell Hart</a></h3>
              <div class="text-muted text-ellipsis">Donec convallis arcu sit</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Eric Graves</a></h3>
              <div class="text-muted text-ellipsis">Ut ac nisi id mauris</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Jessie Cox</a></h3>
              <div class="text-muted text-ellipsis">Sed lacus nisl luctus</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Jonathan Soto</a></h3>
              <div class="text-muted text-ellipsis">Donec congue sagittis mi</div>
            </div>
          </div>
          <div class="mda-list-item"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="List user" class="mda-list-item-img thumb48">
            <div class="mda-list-item-text mda-2-line">
              <h3><a href="#">Guy Carpenter</a></h3>
              <div class="text-muted text-ellipsis">Donec convallis arcu sit</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php 
    include('includes/script.php');
    include('includes/footer.php');
  ?>