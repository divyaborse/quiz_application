<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
if(isset($data)){
  ?>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <tr>
      <th>Quiz_Id</th>
      <th>Question number</th>
      <th>Response</th>
        <th>Correct/Incorrect</th>
     
    </tr>
    <?php
    $score  = 0; 
    foreach($data->result() as $row)

    {
      if($row->response == $row->result){
        $score  = $score +1;
        echo '
        <tr>
        <td>'.$row->q_id.'</td>
        <td>'.$row->ques.'</td>
        <td>'.$row->response.'</td>
        <td>Correct</td>
        
        </tr>
        ';}
        else{
        echo '
        <tr>
        <td>'.$row->q_id.'</td>
        <td>'.$row->ques.'</td>
        <td>'.$row->response.'</td>
        <td>InCorrect</td>
        
        </tr>
        ';}
    }
          ?>
          
    
  </table>
</div>
<?php }
echo '<h4>Final Score:'.$score.'</h4>';
$this->load->model('Model_quiz');
$this->Model_quiz->update_data($score);

?>

<h4> <a href="<?= base_url('Quizes/applyquiz/2699')?>" class="btn btn-primary" >Back</a></h4>

</body>
</html>