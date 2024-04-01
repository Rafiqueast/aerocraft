<div class="col-sm-12">
  <h2>User Record</h2>
  <span class="success" style="color: green;">
  <?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message');}?>
</span>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobby</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($user as $users)
      {?>
    <tr>
      <th><?php echo $users['id']?></th>
      <td><?php echo $users['fname']?></td>
      <td><?php echo $users['lname']?></td>
      <td><?php echo $users['email']?></td>
       <td><?php echo $users['mobile']?></td>
      <td><?php echo $users['gender']?></td>
      <td><?php echo $users['hobby']?></td>
      <td><img src="<?php echo site_url();?>assest/<?php echo $users['image'];?>" width="50" height="50"></td>
      <td><span class="btn-info"><a href="<?php echo site_url()?>Registration/edit?id=<?php echo $users['id'];?>">Edit</a></span><span class="btn-danger">
        <a href="<?php echo site_url()?>Registration/delete?id=<?php echo $users['id'];?>">Delete</a></span><td>
    </tr>
  <?php } ?>
    
  </tbody>
</table>
    
</div>



