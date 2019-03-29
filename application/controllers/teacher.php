<?php 


class Teacher extends CI_Controller
{
	static $data = [];
	public function index()
	{		
		$notes = $this->teachermodel->get_notes($_SESSION['teacher_id']);
		$subject_list = $this->teachermodel->get_all_subjects();
		Teacher::$data['notes'] = $notes;	
		Teacher::$data['subjects'] = $subject_list;	
		$this->load->view('teacher/teacher_notes_view',Teacher::$data);

	}

	public function add_notes()
	{
		
		$config['upload_path']          = './assests/pdf';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 2000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		$notes_data = $this->input->post();
		$notes_data['file_name'] = 'pdf/'.$_FILES['url']['name'];
		$notes_data['teacher_id'] = $_SESSION['teacher_id'];
		$file_name=str_replace(' ', '_', $notes_data['file_name']);


		if($this->upload->do_upload('url'))
		{
			$this->teachermodel->submit_notes($notes_data);
			$this->index();
		}		
	}

	public function events()
	{
		// $this->studentmodel->get_all_events();
		$this->load->view('teacher/event_view',Teacher::$data);

	}

	public function answer()
	{
		Teacher::$data['queries'] = $this->teachermodel->get_ques_ans();
		$this->load->view('teacher/answer_view',Teacher::$data);
	}
	
	public function logout()
	{
		unset($_SESSION['teacher_id']);
		header("Location:../home/index");
	}

	public function add_answer()
	{
		$form_data = $this->input->post();
		$form_data['teacher_id'] = $_SESSION['teacher_id'];
		$this->teachermodel->submit_answer($form_data);
		header("Location:../teacher/answer");

	}
	function __construct()
	{
		parent::__construct();

		$this->load->model('teachermodel');

		$teacher_info = $this->teachermodel->get_teacher($_SESSION['teacher_id']);
		Teacher::$data['teacher_info'] = $teacher_info;
		
		if (!isset($_SESSION['teacher_id'])) {
			header("Location:../home/index");

		}
	}
}

?>