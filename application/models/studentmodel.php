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
}

?>