<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

        <div class="modal-body">

		<div>
	<button onclick="execCmd('bold');"><i class="fa fa-bold"></i></button>
	<button onclick="execCmd('italic');"><i class="fa fa-italic"></i></button>
	<button onclick="execCmd('underline');"><i class="fa fa-underline"></i></button>
	<button onclick="execCmd('strikethrough');"><i class="fa fa-strikethrough"></i></button>
	<button onclick="execCmd('justifyLeft');"><i class="fa fa-align-left"></i></button>
	<button onclick="execCmd('justifyCenter');"><i class="fa fa-align-center"></i></button>
	<button onclick="execCmd('justifyRight');"><i class="fa fa-align-right"></i></button>
	<button onclick="execCmd('justifyFull');"><i class="fa fa-align-justify"></i></button>
	<button onclick="execCmd('cut');"><i class="fa fa-cut"></i></button>
	<button onclick="execCmd('copy');"><i class="fa fa-copy"></i></button>
	<button onclick="execCmd('indent');"><i class="fa fa-indent"></i></button>
	<button onclick="execCmd('outdent');"><i class="fa fa-dedent"></i></button>
	<button onclick="execCmd('subscript');"><i class="fa fa-subscript"></i></button>
	<button onclick="execCmd('superscript');"><i class="fa fa-superscript"></i></button>
	<button onclick="execCmd('undo');"><i class="fa fa-undo"></i></button>
	<button onclick="execCmd('redo');"><i class="fa fa-repeat"></i></button>
	<button onclick="execCmd('insertUnorderedList');"><i class="fa fa-list-ul"></i></button>
	<button onclick="execCmd('insertOrderedList');"><i class="fa fa-list-ol"></i></button>
	<button onclick="execCmd('paragraph');"><i class="fa fa-paragraph"></i></button>
	<button onclick="execCommandWithArg('insertImage', prompt('Enter the image URL', ''));"><i class="fa fa-file-image-o"></i></button>
	<select onchange="execCommandWithArg('formatBlock', this.value);">
		<option value='H1'>H1</option>
		<option value='h2'>H2</option>
		<option value='h3'>H3</option>
		<option value='h4'>H4</option>
		<option value='h5'>H5</option>
		<option value='h6'>H6</option>
		
	</select>
	<button onclick="execCmd('insertHorizontalRule');"><i class="fa fa-horizontal-rule">HR</i></button>
	<button onclick="execCommandWithArg('createLink', prompt('Enter a URL', 'http://'));"><i class="fa fa-link"></i></button>
	<button onclick="execCmd('unlink');"><i class="fa fa-unlink"></i></button>
	<button onclick="toggleSource();"><i class="fa fa-code"></i></button>
	<button onclick="toggleEdit();"><i class="fa fa-horizontal-rule">Toggle edit</i></button>
	<select onchange="execCommandWithArg('fontName', this.value);">
		<option value='Algerian'>Algerian</option>
		<option value='Arial'>Arial</option>
		<option value='Brusher'>Brusher</option>
		<option value='Calibri'>Calibri</option>
		<option value='Georgia'>Georgia</option>
		<option value='Times New Romans'>Times New Romans</option>
		<option value='Verdana'>Verdana</option>
	</select>
	<select onchange="execCommandWithArg('fontSize', this.value);">
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
		<option value='6'>6</option>
		<option value='7'>7</option>
	</select>
	font color: <input type='color' onchange="execCommandWithArg('foreColor', this.value);"/>
	background: <input type='color' onchange="execCommandWithArg('hilitecolor', this.value);"/>
	<button onclick="execCmd('selectAll');"><i class="fa fa-horizontal-rule">Select All</i></button>
	</div>
	
	<form action="code.php" method="POST" enctype="multipart/form-data">
	<!----	<iframe name="blog" id='blog' class='col-mb-8'></iframe>---->
      </div>
	  <div class="form-group">
                <label>Add your Kisse </label>
                <textarea name="blog"  class="form-control" placeholder="" height='200'></textarea>
            </div>
			<div class="form-group h-55">
                <label>subtitle  </label>
                <textarea name="subtitle"  class="form-control" placeholder="" height='100'></textarea>
            </div>	
	  	<div class="form-group">
                <label> Title of Blog </label>
                <input type="text" name="title"  class="form-control" placeholder="Enter Title">
            </div>
			
			<div class="form-group">
                <label> Upload Picture </label>
                <input type="file" name="file" class="form-control" >
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="composebtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<?php
    $con = mysqli_connect('localhost','root','','user');
	$table=$_SESSION['username'];

    
    $query="Select * from $table";
    $query_run=mysqli_query($con,$query);

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Blog
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addBlog">
              Compose Blog
            </button>
    </h6>
  </div>
  </div>
  <div class="row">
  <?php
  if(mysqli_num_rows($query_run)>0)
          {
            while($row= mysqli_fetch_assoc($query_run))
              { 

                ?>

          
            
			<div class="col-sm-4">
    <div class="card">
	<img src='<?php echo $row ['file'];?>' class="card-img-top" height='200' width='10' >
      <div class="card-body">
        <h5 class="card-title"><?php echo $row ['title'];?></h5>
        <p class="card-text"><?php echo $row ['subtitle'];?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
             <?php
              } 
          }
          else

          {
			?>
            <div class="col-sm-4">
    <div class="card">
	<img src='' class="card-img-top" height='200' width='10' >
      <div class="card-body">
        <h5 class="card-title">No blog</h5>
        <p class="card-text">Start writting your kisse</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <?php
          }

          ?>
		 
          
            </div>
			
             
  
		<script type="text/javascript">
		var showingSourceCode=false;
		var isInEditmode=true;
		let

		function enableEditMode (){
			blog.document.designMode='on';
		}
		function execCmd(command){
			blog.document.execCommand(command,false,null);
		}

		function execCommandWithArg(command,arg){
			blog.document.execCommand(command,false,arg);
	}
	function toggleSource(){
		if(showingSourceCode){
			blog.document.getElementsByTagName('body')[0].innerHTML=blog.document.getElementsByTagName('body')[0].textContent;
			showingSourceCode=false;
		}
		else{
			blog.document.getElementsByTagName('body')[0].textContent=blog.document.getElementsByTagName('body')[0].innerHTML;
			showingSourceCode=true;
		}
	}
	function toggleEdit(){
		if(isInEditmode)
		{
			blog.document.designMode='off';
			isInEditmode=false;
		}
		else
		{
			blog.document.designMode='on';
			isInEditmode=true;
		}
	}
	
</script>
<?php
include('includes/script.php');
include('includes/footer.php');
?>