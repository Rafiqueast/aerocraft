<div class="col-sm-12">
  <h2>Edit Registration</h2>
  <form action="<?php echo site_url()?>/Registration/update_user"  enctype="multipart/form-data" method="post">
    <div class="form-group"> 
     <input type="hidden" name="editid" value="<?php echo $editid;?>">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $user['fname']; ?>">
      <?php if(form_error('fname')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('fname'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" name="lname" value="<?php echo $user['lname']; ?>">
      <?php if(form_error('lname')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('lname'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  name="email" value="<?php echo $user['email']; ?>">
      <?php if(form_error('email')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('email'));?></span>  
            <?php  };?>
    </div>
    <div class="form-group">
      <label for="email">Mobile:</label>
      <div class="row">
     <div class="col-sm-3">
      <select class="form-control" name="country_code">
        <option <?php if($user['country_code']=='+91'){ echo 'selected';}?>>+91</option>
        <option <?php if($user['country_code']=='+92'){ echo 'selected';}?>>+92</option>
        <option <?php if($user['country_code']=='+93'){ echo 'selected';}?>>+93</option>
        <option <?php if($user['country_code']=='+94'){ echo 'selected';}?>>+94</option>
        <option <?php if($user['country_code']=='+95'){ echo 'selected';}?>>+95</option>
      </select>
  </div>
  <div class="col-sm-9">
      <input type="tel" class="form-control" name="mobile" value="<?php echo $user['mobile']; ?>">
      <?php if(form_error('mobile')){?>
                <span style="color:red"> <?php echo strip_tags(form_error('mobile'));?></span>  
            <?php  };?>
    </div>

    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <textarea class="form-control" rows="5"  name="address"><?php echo $user['adress']; ?></textarea>
      <?php if(form_error('address')){?>
                <span style="color:red"> <?php echo form_error('address');?></span>  
            <?php  };?>
    </div>

    <div class="form-group">
      <label for="pwd">Gender:</label>
    </br>
      
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"  <?php if($user['gender']=='male'){ echo 'checked';};?> value="male" />
  <label class="form-check-label" for="inlineRadio1">Male</label>


  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" <?php if($user['gender']=='female'){ echo 'checked';}?> value="female"  />
  <label class="form-check-label" for="inlineRadio2">Female</label>

    </div>
    <div class="form-group">
      <label for="pwd">Hobby:</label>
    </br>

      <input type="checkbox" class="form-check-input" id="check2" name="hobby[]" <?php if($user['hobby']=='singing'){ echo 'checked';}?> value="singing" checked>
      <label class="form-check-label" for="check2">Singing</label>
      <input type="checkbox" class="form-check-input" id="check2" name="hobby[]" <?php if($user['hobby']=='singing'){ echo 'checked';}?> value="reading">
      <label class="form-check-label" for="check2">Reading Book</label>
    
 <!-- 
      <input type="checkbox" class="form-check-input" disabled>
      <label class="form-check-label">Option 3</label> -->
   
       <div class="form-group">
      <label for="email">Photo:</label>
      <input type="file" class="form-control" id="file" name="pic">
      <input type="hidden" name="oldpic" value="<?php echo $user['image'];?>">
      <span style="color:red">
        <?php if(!empty($imgerror)){ echo $imgerror;} ?>
     
    </span>
    </div>
  

    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>



