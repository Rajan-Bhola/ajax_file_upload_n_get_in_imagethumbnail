<?php 
/**
 * Template Name: Data
 *
 * @package accesspress_parallax
 */  get_header(); 
$link = get_permalink();
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.css">
<link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


 <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->
    <?php
    endwhile;
  echo do_shortcode("[ultimatemember form_id=8]");  ?>
    </div><!-- #content -->         
</div><!-- #container -->

<?php
$user_id = get_current_user_id();
$user_last = get_user_meta( $user_id,'',$single = false ); 

//echo "<pre>";
//print_r($user_last);

/* if(isset($_POST["profile_update"]))
{
	foreach ($data as $key => $val)
	{
	$success = update_user_meta( $user_id, $key, $val );
	
	}
}
if(isset($success))
{
echo "<script>alert('Update Successful'); </script>";
}
*/
/*if(isset($_POST['pan_update'])){
	//echo "<pre>";
	//print_r($_POST);
	//die("test");
	 foreach ($_POST as $key => $val){
    $success = update_user_meta( $user_id, $key, $val );
    }
	if(isset($success))
	{
		echo "<script>alert('updated successful'); </script>";
	}
	
$file_name = $_FILES['file']['name'];
$file_tmp  = $_FILES['file']['tmp_name'];
$upload_dir = wp_upload_dir();

$file_path = $upload_dir['baseurl'].'/'.$file_name;

if($_FILES['file1']['error'] == 0){
    move_uploaded_file($file_tmp,$file_path);
    echo "success";
}
$data = array(
  'pan_number' => $_POST['pan_number'],
  'attach_pan_card' => $file_path,
  ); 
  $user_id = get_current_user_id();
  foreach ($data as $key => $val){
    $success = update_user_meta( $user_id, $key, $val );
    }
  }  */


/*
if(isset($_POST['bank_update'])){
	//print_r($_POST);
	//die("test");

 $file_name = $_FILES['file']['name'];
$file_tmp  = $_FILES['file']['tmp_name'];
$upload_dir = wp_upload_dir();

$file_path = $upload_dir['baseurl'].'/'.$file_name;

if($_FILES['file']['error'] == 0){
    move_uploaded_file($file_tmp,$file_path);
    echo "success";
}
$data = array(
  'holder_name' => $_POST['holder_name'],
  'account_no' => $_POST['account_no'],
  'bank_name' => $_POST['bank_name'],
  'bank_branch' => $_POST['bank_branch'],
  'ifsc_code' => $_POST['ifsc_code'],
  'attach_account_no' => $file_path,
  );

  $user_id = get_current_user_id();
  foreach ($data as $key => $val){
    $success = update_user_meta( $user_id, $key, $val );
    if($success){
      echo "<script>	  jQuery('.success_message').css('display','block');                        setTimeout(function() {                           location.reload();                        }, 5000);			</script>";
    }
  }  
}
  */

 ?>
 <div class="wrapper">
 <div class="container">
 <ul class="nav nav-tabs">
  <li class="active"><a href="#profile_details" data-toggle="tab">Profile Details</a></li>
  <li><a href="#bank_details" data-toggle="tab">Bank Details</a></li>
  <li><a href="#pan_details" data-toggle="tab">Pan Details</a></li>
</ul>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="profile_details">
    <form class="form-horizontal" name="profile_form" id="update_profile_form" >
  <fieldset>
    <legend><center>Profile Details</center></legend>

    <div class="form-group control-group">
    <label for="first_name" class="col-lg-2 control-label">First Name</label>
     <div class="col-lg-7 controls">
      <input class="required form-control" name="first_name" id="first_name" value="<?php echo $user_last['first_name'][0]; ?>" type="text"  />
	  <p class="help-block"></p>
      </div>
    </div>

   <div class="form-group">
      <label for="sdw" class="col-lg-2 control-label">Sdw</label>
      <div class="col-lg-7">
        <select class="required form-control" name="sdw" id="sdw">
         <option value="S/O" <?php if($user_last['sdw'][0]  == "S/O") echo "selected"; ?> >S/O</option>
         <option value="D/O" <?php if($user_last['sdw'][0]  == "D/O") echo "selected"; ?> >D/O</option>
         <option value="W/O" <?php if($user_last['sdw'][0]  == "W/O") echo "selected"; ?> >W/O</option>
        </select>
      </div>
    </div>



    <div class="form-group">
    <label  for="sdw_name" class="col-lg-2 control-label">Sdw Name</label>
     <div class="col-lg-7">
      <input class="required form-control" name="sdw_name" id="sdw_name" value="<?php echo $user_last['sdw_name'][0]; ?>" type="text" />
	   <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
      <label for="address" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-7">
        <textarea class="required form-control" rows="3" name="address" id="address" ><?php echo $user_last['address'][0]; ?></textarea>
		 <p class="help-block"></p>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>

    <div class="form-group">
    <label  for="city" class="col-lg-2 control-label">City</label>
     <div class="col-lg-7">
      <input class="required form-control" name="city" id="city" value="<?php echo $user_last['city'][0]; ?>" type="text"  />
	   <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
      <label for="state" class="col-lg-2 control-label">state</label>
        <div class="col-lg-7">
        <select class="required form-control"  name="state" id="state" >
        <option value="chandigarh" <?php if($user_last['state'][0]  == "chandigarh") echo "selected"; ?>>Chandigarh</option>
        <option value="haryana" <?php if($user_last['state'][0]  == "haryana") echo "selected"; ?>>Haryana</option>
        </select>
		 <p class="help-block"></p>
        </div>
    </div>

    <div class="form-group">
    <label for="pin_code" class="col-lg-2 control-label">Pin Code</label>
     <div class="col-lg-7">
      <input class="required form-control" name="pin_code" id="pin_code" value="<?php echo $user_last['pin_code'][0]; ?>" type="text">
	   <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group control-group">
    <label for="mobile_no" class="col-lg-2 control-label">Mobile No</label>
     <div class="col-lg-7 controls">
      <input class="required phone form-control" maxlength="10" name="mobile_no" id="mobile_no" value="<?php echo $user_last['mobile_no'][0]; ?>" type="text" pattern="\d*"  required />
	   <p class="help-block"></p>
	  <p class="help-block">Only Numbers are allowed</p>
      </div>
    </div>

 
    <div class="form-group">
    <label for="date_of_birth" class="col-lg-2 control-label">Date Of Birth</label>
     <div class="col-lg-7">
      <input class="required datepicker form-control" value="<?php echo $user_last['date_of_birth'][0]; ?>" class="datepicker" id="date_of_birth" type="text">
	   <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
      <label for="gender" class="col-lg-2 control-label">Gender</label>
      <div class="col-lg-7">
      <select class="required form-control" name="gender" id="gender">
      <option value="male" <?php if($user_last['gender'][0]  == "male") echo "selected"; ?>>Male</option>
      <option value="female" <?php if($user_last['gender'][0]  == "female") echo "selected"; ?>>Female</option>
       </select>
	    <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <label for="e-mail_id" class="col-lg-2 control-label">E-mail Id</label>
     <div class="col-lg-7">
      <input class="required email form-control" name="e-mail_id" id="e-mail_id" value="<?php echo $user_last['e-mail_id'][0]; ?>" type="email" >
	   <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <label for="nominee_name" class="col-lg-2 control-label">Nominee Name</label>
     <div class="col-lg-7">
      <input class="required form-control" pattern="^[a-zA-Z\s]+$" name="nominee_name" id="nominee_name" value="<?php echo $user_last['nominee_name'][0]; ?>" type="text">
	  <p class="help-block">Only Alphabets are allowed</p>
      </div>
    </div>

    <div class="form-group">
    <label for="nominee_relation" class="col-lg-2 control-label">Nominee Relation</label>
     <div class="col-lg-7">
	 <select class="form-control" name="nominee_relation" id="nominee_relation">
	 <option value="Wife" <?php if($user_last['nominee_relation'][0]  == "Wife") echo "selected"; ?>>Wife</option>
	 <option value="Father" <?php if($user_last['nominee_relation'][0]  == "Father") echo "selected"; ?>>Father</option>
	 <option value="Mother" <?php if($user_last['nominee_relation'][0]  == "Mother") echo "selected"; ?>>Mother</option>
	 <option value="Sister" <?php if($user_last['nominee_relation'][0]  == "Sister") echo "selected"; ?>>Sister</option>
	 <option value="Daughter" <?php if($user_last['nominee_relation'][0]  == "Daughter") echo "selected"; ?>>Daughter</option>
	 <option value="Husband" <?php if($user_last['nominee_relation'][0]  == "Husband") echo "selected"; ?>>Husband</option>
	 <option value="Other" <?php if($user_last['nominee_relation'][0]  == "Other") echo "selected"; ?>>Other</option>
	 </select>
	  <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <div class="col-lg-2"></div>
      <div class="col-lg-2">
        <button class="btn btn-primary" id="profile_update" name="profile_update"> Update</button>
      </div>
      <div class="col-lg-5 success_message" style="display: none;">
        <div class="notice notice-success">
        <strong>Notice:</strong> Profile Details Update Successfully.
    </div>
      </div>
    </div>
  </fieldset>
  </form>
  </div>




  <div class="tab-pane fade" id="bank_details">
    <form class="form-horizontal"  enctype="multipart/form-data">
    <fieldset>
   <legend><center>Bank Details</center></legend>
    <div class="form-group">
    <label for="holder_name" class="col-lg-2 control-label">Holder Name</label>
     <div class="col-lg-7">
      <input class="required form-control" name="holder_name" id="holder_name" value="<?php echo $user_last['holder_name'][0]; ?>" type="text" required />
	  <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <label for="account_no" class="col-lg-2 control-label">Account No</label>
     <div class="col-lg-7">
      <input class="required acc_no form-control" name="account_no" id="account_no" value="<?php echo $user_last['account_no'][0]; ?>" type="text" required />
	  <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <label for="bank_name" class="col-lg-2 control-label">Bank Name</label>
     <div class="col-lg-7">
      <input class="required form-control" name="bank_name" id="bank_name" value="<?php echo $user_last['bank_name'][0]; ?>" type="text" required />
	  <p class="help-block"></p>
      </div>
    </div>

    <div class="form-group">
    <label for="bank_branch" class="col-lg-2 control-label">Bank Branch</label>
     <div class="col-lg-7">
      <input class="required form-control" name="bank_branch" id="bank_branch" value="<?php echo $user_last['bank_branch'][0]; ?>" type="text" required />
	  <p class="help-block"></p>
      </div>
    </div>


    <div class="form-group">
    <label for="ifsc_code" class="col-lg-2 control-label">Ifsc Code</label>
     <div class="col-lg-7">
      <input class="required form-control" name="ifsc_code" id="ifsc_code" value="<?php echo $user_last['ifsc_code'][0]; ?>" type="text" required />
	  <p class="help-block"></p>
      </div>
    </div>
 

    <div class="form-group">
    <label for="attach_pan_card" class="col-lg-2 control-label">Attach Account No</label>
     <div class="col-lg-3">
      <input class="form-control" name="file" type="file">
      </div>
      <div class="col-lg-4">
      <img src="<?php echo $user_last['attach_account_no'][0]; ?>" alt="Responsive image" class=" img-thumbnail">
      </div>
    </div>

  
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <button class="btn btn-primary" name="bank_update" id="bank_update">Bank update</button>
      </div>
    </div>

  </fieldset>
  </form>

  </div>

  
  <div class="tab-pane fade" id="pan_details">
<form id="pan_data" class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>
   <legend><center>Pan Details</center></legend>
    <div class="form-group">
    <label for="pan_number  " class="col-lg-2 control-label" required />Pan Number</label>
     <div class="col-lg-7">
      <input class="required acc_no form-control" name="pan_number" id="pan_number" value="<?php echo $user_last['pan_number'][0]; ?>" type="text">
    <p class="help-block"></p>
      </div>
    </div>
    
    <div class="form-group">
    <label for="attach_pan_card" class="col-lg-2 control-label">Attach Pan Card</label>
     <div class="col-lg-3">
      <input class="form-control" id="pancard" name="file" type="file">
      </div>
      <div class="col-lg-4">
      <img src="<?php echo wp_get_attachment_url($user_last['attach_pan_card'][0]); ?>" alt="Responsive image" class="img-thumbnail">
      </div>
    </div>

<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <!--input type="submit" value="submit" name="pan_update"-->
        <button  id="update_pan_Card" class="btn btn-primary">Pan Update</button>
      </div>
    </div>
  </fieldset>
  </form>
 
  </div>
  
</div>

</div>
</div>

<script>


                      
       jQuery(document).on('click', '#close-preview', function(){ 
    jQuery('.image-preview').popover('hide');
    // Hover befor close the preview
    jQuery('.image-preview').hover(
        function () {
           jQuery('.image-preview').popover('show');
        }, 
         function () {
           jQuery('.image-preview').popover('hide');
        }
    );    
});

jQuery(function() {
    // Create the close button
    var closebtn = jQuery('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    jQuery('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+jQuery(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    jQuery('.image-preview-clear').click(function(){
        jQuery('.image-preview').attr("data-content","").popover('hide');
        jQuery('.image-preview-filename').val("");
        jQuery('.image-preview-clear').hide();
        jQuery('.image-preview-input input:file').val("");
        jQuery(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    jQuery(".image-preview-input input:file").change(function (){     
        var img = jQuery('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            jQuery(".image-preview-input-title").text("Change");
            jQuery(".image-preview-clear").show();
            jQuery(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            jQuery(".image-preview").attr("data-content",jQuery(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
<style>
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<?php
 get_footer(); ?>