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
		// echo "<pre>";
		// print_r($this->input->post());

		// // print_r($_FILES["url"]);

		$notes_data = $this->input->post();
		$notes_data['file'] = (object) $_FILES["url"];
		$notes_data['teacher_id'] = $_SESSION['teacher_id'];
		echo "<pre>";
		print_r($notes_data);
		echo "</pre>";

		$this->teachermodel->submit_notes($notes_data);
	}

	public function events()
	{
		$this->load->view('events');
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