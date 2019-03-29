<?php
include 'student_header_view.php'; 
include 'student_sidebar_view.php';
?>

<div class="content-wrapper">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin:20px;margin-left:2px;">Ask question</button>
  <hr>
  <h4 style="color:blue;"></h4><br>

  <div class="form-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Post a Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../student/submit_query" method="post">

              <div class="form-group">
                <label for="subject">Subject</label>
                <select name="subject" id="subject" class="form-control" required="required">
                  <option value="null" disabled="disabled" selected="selected">Select subject</option>
                  <?php foreach($subjects as $subject): ?>
                    <option value="<?php echo $subject->subject_id ?>"><?php echo $subject->subject_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="title">Question</label>
                <input type="text" class="form-control" id="title"  placeholder="Type your query here . . " name="query" required="required">
              </div>
              <button type="submit" class="btn btn-primary">Post</button>


            </form>
          </div>
          

        </div>
      </div>
    </div>
  </div>



</div>

<div class="content-wrapper" style="margin-top: 150px;width: 100%;padding-right: 20px;">
  <div class="query-wrapper">
    <h4 style="color:blue">Your questions</h4>
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
              <span style="padding: 20px;">No teacher ansered to this ques yet.</span>
              
            <?php endif; ?>

          </ul>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>



</div>
<?php 
include 'student_footer_view.php';
?>