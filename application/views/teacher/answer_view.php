<?php include 'teacher_header_view.php'; ?>
<?php include 'teacher_sidebar_view.php'; ?>
<div class="content-wrapper">
	<div class="query-wrapper">
		<h4 style="color:blue">Questions</h4>
		<br><br>
		<?php foreach($queries as $q): ?>
			<div class="query" style="margin-bottom: 20px">
				<div class="card" style="width:100%">
					<div class="card-header">
						<strong>Question: </strong><?php echo $q['ques']->query; ?>
					</div>
					<ul class="list-group list-group-flush">
						<?php if($q['ans']!=null): ?>
							<?php foreach($q['ans'] as $a): ?>
								<li class="list-group-item"> <strong>Answer: </strong><?php echo $a->answer ?><br>
									<span><small style="float: right;">by: <?php echo $a->teacher_id ; ?></small></span>
								</li>

							<?php endforeach; ?>
						<?php endif; ?>

						<?php if(empty($q['ans'])):  ?>
							<span style="padding: 20px;">No teacher answered to this ques yet.</span>

						<?php endif; ?>

					</ul>
					<button id="answer_button" onclick="button_clicked(<?php echo $q['ques']->q_id; ?>)" class="btn btn-primary" value="<?php echo $q['ques']->q_id; ?>"  style="width: 120px;height: 30px;float: right;padding-bottom: 30px;" data-toggle="modal" data-target="#exampleModal" >Answer</button>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

		
	<h4 style="color:blue;"></h4><br>

	<div class="form-wrapper">

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Contribute your answer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="add_answer" method="post">
							<div class="form-group">
								<label for="title">Type your answer . . </label>
								<!-- <input type="text" class="form-control" id="title"  placeholder="Type your answer" name="answer" required="required"> -->
								<textarea name="answer" id="answer" cols="30" rows="10" placeholder="Type your answer. . " required class="form-control"> </textarea>
							</div>
							<div class="form-group" id="hidden_field">
								
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
	
</div>

<?php include 'teacher_footer_view.php'; ?>