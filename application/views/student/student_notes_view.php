<?php
include 'student_header_view.php'; 
include 'student_sidebar_view.php';
?>

<div class="content-wrapper">
	<div class="subject-div" class="form-group">
		<select name="subject" id="subject" class="form-control">
			<option value="null" selected disabled>Select subject</option>
			<?php foreach($subjects as $subject): ?>
				<option value="<?php echo $subject->subject_id ?>"><?php echo $subject->subject_name ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="notes-wrapper" id="notes-wrapper">
		
	</div>
</div>


<?php 
include 'student_footer_view.php';
?>