<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->helper('url', 'form');
    $this->load->model('user'); 
    $this->load->database();
    $this->load->library('form_validation');
    $this->load->library('session');
  }
	public function index()
	{  
		$data['heading']="User Record";
		$data['user']=$this->user->userList('user');
		//print_r($data['user']);exit;
		$data['content']='userrecords.php';
		$this->load->view('app.php',$data);
	}

	public function create_User()
	{
		$data['heading']="User Record";
		$data['content']='registration.php';
		$this->load->view('app.php',$data);

	}

	public function add_user()
	{
		//echo "<pre>"; print_r($_POST);exit;
			$config['upload_path']          = './assest/';
			//$config['allowed_types']        = 'gif|jpg|png';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 76800;
			$this->load->library('upload', $config);
		
			$this->form_validation->set_rules('fname', 'First Name', 'required');
			$this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email',' Email','trim|required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('mobile','Mobile','required|is_unique[user.email]');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('gender','gender','required');
			//$this->form_validation->set_rules('hobby','hobby','required');

			if($this->form_validation->run() == FALSE || ! $this->upload->do_upload('pic'))
			{   
				$data['imgerror'] = $this->upload->display_errors();
				//print_r($data['imgerror']);exit;
				$data['content']="registration.php";
				$this->load->view("app",$data);

			}
			else
			{

				$img=$_FILES['pic']['name'];
				$hobby=implode(',', $_POST['hobby']);
				$insert=array('fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'email'=>$_POST['email'],'country_code'=>$_POST['country_code'],'mobile'=>$_POST['mobile'],'gender'=>$_POST['gender'],'hobby'=>$hobby,'image'=>$img);
				$fire=$this->user->insertdata('user',$insert);

				if($fire)
				{
					$this->session->set_flashdata('message','User successful Added');
					redirect('Registration');
				}
			}

	}

	public function edit()
	{
		//print_r($_GET)
		$where=array('id'=>$_GET['id']);
		$data['user']=$this->user->edit('user',$where);
		//print_r($data['user']);exit;
		$data['editid']=$_GET['id'];
		$data['content']='edit.php';
		$this->load->view('app',$data);

	}

	public function update_user()
	{
		//echo "<pre>"; print_r($_FILES);exit;
		$this->form_validation->set_rules('fname','Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('gender','gender','required');
		$img=$_POST['oldpic'];
		if(isset($_FILES['pic']['name']))
		{
			$config['upload_path']          = './assest/';
			//$config['allowed_types']        = 'gif|jpg|png';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 76800;
			$this->load->library('upload', $config);
            
			if($this->form_validation->run() == FALSE || ! $this->upload->do_upload('pic'))
			{   
				$data['imgerror'] = $this->upload->display_errors();
				//print_r($data['imgerror']);exit;
				$data['editid']=$_POST['editid'];
				$where=array('id'=>$_POST['editid']);
				$data['user']=$this->user->edit('user',$where);
				$data['content']="edit.php";
				$this->load->view("app",$data);
				//redirect('Registration/edit?id='.$_POST['editid']);

			}
			$img=$_FILES['pic']['name'];
		}
		
		if($this->form_validation->run()==FALSE)
		{
				$data['editid']=$_POST['editid'];
				$where=array('id'=>$_POST['editid']);
				$data['user']=$this->user->edit('user',$where);
				$data['content']="edit.php";
				$this->load->view("app",$data);
				

		}
		$hobby=implode(',',$_POST['hobby']);
		$updatedata=array('fname'=>$_POST['fname'],
						  'lname'=>$_POST['lname'],
						  'email'=>$_POST['email'],
						  'country_code'=>$_POST['country_code'],
						  'mobile'=>$_POST['mobile'],
						  'gender'=>$_POST['gender'],
						  'hobby'=>$hobby,
						  'image'=>$img);
		$where=array('id'=>$_POST['editid']);

		$fire=$this->user->updateUser("user",$updatedata,$where);

		if($fire)
		{   $this->session->set_flashdata('message','User successful update');
			redirect('Registration');
		}


	}

	public function delete()
	{
		$where=array('id'=>$_GET['id']);
		$fire=$this->user->del('user',$where);
		if($fire)
		{
			$this->session->set_flashdata('message','record deleted');
			redirect('Registration');
		}
	}
}
