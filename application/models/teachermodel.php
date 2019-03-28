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
		$url = 'pdf/'.$file->name;
		$subject_name = $this->db->query("select subject_name from subject where subject_id='$subject'")->result()[0]->subject_name;
		
		$config['upload_path']          = '../../assests/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 20000;
		$config['max_width']            = 2024;
		$config['max_height']           = 1768;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('url',$config))
		{		
			echo $url;
			$this->db->query("insert into notes(teacher_id, url, description, subject_name, title) values('$teacher_id','$url','$description','$subject_name',$title)");
			if($this->db->affected_rows()>0)
			{
				echo "done";exit;
			}
			return true;
		}
		else return false;
	}
	
}

?>