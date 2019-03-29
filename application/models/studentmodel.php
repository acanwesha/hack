<?php  

/**
 * Student Model
 */	
class Studentmodel extends CI_Model
{
	
	public function get_notes($usn)
	{
		$query = $this->db->query("select DISTINCT notes.*, subject_name from notes, student, subject, class where student.usn = '$usn' and student.class_id = class.class_id and class.semester = subject.semester and class.branch = subject.branch and subject.subject_id=notes.subject_id ");
		return $query->result();
	}

	public function get_subjects($usn)
	{
		$query = $this->db->query("select subject.* from subject, student, class where student.usn='$usn' and student.class_id=class.class_id and class.branch=subject.branch and class.semester=subject.semester");
		return $query->result();
	}

	public function get_all_events()
	{
		$query = $this->db->query("select * from event order by date desc");
		return $query->result();
	}
	public function get_all_subjects($usn)
	{
		$query = $this->db->query("select * from subject, student, class where student.usn='$usn' and student.class_id=class.class_id and class.branch=subject.branch and class.semester=subject.semester");
		return $query->result();
	}

	public function submit_query($form_data)
	{
		extract($form_data);
		$this->db->query("insert into query(subject_id,query,usn) values('$subject','$query','$usn')");
	}
	public function get_ques_ans($usn)
	{
		$query = $this->db->query("select * from query where usn = '$usn'");
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
}

?>