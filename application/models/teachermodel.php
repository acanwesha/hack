<?php 

/**
 * Student Model
 */
class Teachermodel extends CI_Model
{
	public function get_teacher($teacher_id)
	{
		$query = $this->db->query("select * from teacher where teacher_id='$teacher_id' ");
		return $query->result();
	}

	public function get_notes($teacher_id)
	{
		$query = $this->db->query("select notes.*,subject_name from notes, subject where teacher_id='$teacher_id' and subject.subject_id=notes.subject_id");
		return $query->result();
	}

	public function get_all_subjects()
	{
		$query = $this->db->query("select * from subject");
		return $query->result();
	}

	public function submit_notes($notes_data)
	{
		extract($notes_data);
		$query2 = $this->db->query("select subject_name from subject where subject_id= '$subject'");

		$this->db->query("insert into notes(teacher_id, url, description, subject_id, title) values('$teacher_id','$file_name','$description','$subject','$title')");
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else return false;
	}

	public function get_all_events()
	{
		$query = $this->db->query("select * from event order by date desc");
		return $query->result();
	}

	public function get_ques_ans()
	{
		$query = $this->db->query("select * from query");
		$ques = $query->result();
		$ques_ans=[];
		$ques_ansers = [];

		foreach($ques as $q)
		{
			$ques_ans['ques'] = $q;
			$query2 = $this->db->query("select * from answer where q_id = '$q->q_id'");
			$ques_ans['ans'] = $query2->result();
			$ques_ansers[] = $ques_ans;
		}

		return $ques_ansers;
	}

	public function submit_answer($form_data)
	{
		extract($form_data);
		$this->db->query("insert into answer(q_id,answer,teacher_id) values('$q_id','$answer','<1></1>teacher_id')");
	}
	
}

?>