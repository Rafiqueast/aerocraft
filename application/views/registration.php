<div class="col-sm-12">
  <h2>User Registration</h2>
  <form action="<?php echo site_url()?>/Registration/add_user"  enctype="multipart/form-data" method="post">
    <div class="form-group"> 
      <?php //echo validation_errors();?>
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="<?php echo set_value('fname'); ?>">
      <?php if(form_error('fname')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('fname'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="<?php echo set_value('lname'); ?>">
      <?php if(form_error('lname')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('lname'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo set_value('email'); ?>">
      <?php if(form_error('email')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('email'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="email">Mobile:</label>
      <div class="row">
     <div class="col-sm-3">
      <select class="form-control" name="country_code">
        <option>+91</option>
        <option>+92</option>
        <option>+93</option>
        <option>+94</option>
        <option>+95</option>
      </optgroup></select>
  </div>
  <div class="col-sm-9">
      <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" value="<?php echo set_value('mobile'); ?>">
      <?php if(form_error('mobile')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('mobile'));?></span>  
            <?php  };?>
    </div>

    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <textarea class="form-control" rows="5" id="comment" name="address"><?php echo set_value('address'); ?></textarea>
      <?php if(form_error('address')){?>
                <span style="color:red"> <?php echo form_error('address');?></span>  
            <?php  };?>
    </div>

    <div class="form-group">
      <label for="pwd">Gender:</label>
      <?php if(form_error('gender')){?>
                <span style="color:red"> <?php echo form_error('gender');?></span>  
            <?php  };?>
    </br>
      
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"  <?php if(set_value('gender')=='male'){ echo 'checked';};?> value="male" />
  <label class="form-check-label" for="inlineRadio1">Male</label>


  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" <?php if(set_value('gender')=='female'){ echo 'checked';}?> value="female"  />
  <label class="form-check-label" for="inlineRadio2">Female</label>

    </div>
    <div class="form-group">
      <label for="pwd">Hobby:</label>
       <?php if(form_error('hobby')){?>
                <span style="color:red"> <?php echo form_error('hobby');?></span>  
            <?php  };?>

    </br>

      <input type="checkbox" class="form-check-input" id="check2" name="hobby[]" <?php if(set_value('hobby')=='singing'){ echo 'checked';}?> value="singing" checked>
      <label class="form-check-label" for="check2">Singing</label>
      <input type="checkbox" class="form-check-input" id="check2" name="hobby[]" <?php if(set_value('hobby')=='singing'){ echo 'checked';}?> value="reading">
      <label class="form-check-label" for="check2">Reading Book</label>

    
   
       <div class="form-group">
      <label for="email">Photo:</label>
      <input type="file" class="form-control" id="file" name="pic">
      <span style="color:red">
        <?php if(!empty($imgerror)){ echo $imgerror;} ?>
     
    </span>
    </div>
  

    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>



