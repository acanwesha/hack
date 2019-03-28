<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	static $data = [];

	public function index()
	{
		$this->load->view('student/events_view');
	}

	public function notes()
	{
		Student::$data['subjects'] = $this->studentmodel->get_subjects($_SESSION['usn']);
		
		$this->load->view('student/student_notes_view',Student::$data);
	}


	public function get_notes()
	{
		$notes = $this->studentmodel->get_notes($_SESSION['usn']);
		echo json_encode($notes);
	}
	public function query()
	{
		$this->load->view('student/query_view');		
	}


	public function feedback()
	{

	}

	public function logout()
	{
		unset($_SESSION['usn']);
		header("Location:../home/index");
	}

	public function __construct()
	{
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
		$this->load->model('studentmodel');

		if(!isset($_SESSION['usn']))
		{
			header('Location:../home/index');
		}
	}
}
