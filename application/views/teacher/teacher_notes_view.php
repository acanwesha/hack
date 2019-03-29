<?php include 'teacher_header_view.php'; ?>
<?php include 'teacher_sidebar_view.php'; ?>

<div class="content-wrapper">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin:20px;margin-left:2px;">Add Notes</button>
	<hr>
	<h4 style="color:blue;"></h4><br>

	<div class="form-wrapper">

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="add_notes" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" id="title"  placeholder="Enter a suitable title" name="title" required="required">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" id="description" placeholder="Enter description" name="description" required="required">
							</div>
							<div class="form-group">
								<label for="subject">Subject</label>
								<select name="subject" id="subject" class="form-control" required="required">
									<option value="null" disabled="disabled" selected="selected">Select subject</option>
									<?php foreach($subjects as $subject): ?>
										<option value="<?php echo $subject->subject_id ?>"><?php echo $subject->subject_name; ?></option>
									<?php endforeach; ?>


								</select>
							</div>
							<div class="form-group" style="font-size: 1em;">
								<label for="url">File</label>
								<input type="file" class="form-control" id="url" name="url" placeholder="Select notes file" required="required">
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>


	<?php foreach($notes as $note): ?>
		<div class="card mb-3">

			<div class="card-body">
				<embed src="<?php echo '../assests/'.$note->url; ?>" width="80%" height="200px" />
					<a href="<?php echo '../assests/'.$note->url;  ?>" target="_blank">Download</a>
					<h5 class="card-title"><?php echo $note->title ?></h5>
					<small><?php echo $note->subject_name ?></small>
					<p class="card-text"><?php echo $note->description ?></p>
					<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

					<div>
						<i class="fa fa-star" aria-hidden="true" ></i>Rating: <span><?php echo $note->rating ?></span>
						<span style="float:right"><i class="fa fa-download" aria-hidden="true"></i>Downloads <span><?php echo $note->downloads ?></span></span>

					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>

	<?php include 'teacher_footer_view.php'; ?>