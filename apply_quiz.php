<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="container">
    <div class="card bg-light border-info m-3">
        <form action="<?php echo base_url(); ?>quizes/result/<?php echo $q_id . '/' . $count; ?>" id="quizform" method="POST" class="form-horizontal">
            <?php   
            $q_id = $this->uri->segment(3);
            $this->load->model('Model_quiz');
            $ans =$this->Model_quiz->fetch_result($q_id);
            if($ans){
            $this->load->model('Model_quiz');
            $result =$this->Model_quiz->display_result($q_id);
            echo "<center>";
            echo "Result of the quiz";
            echo "<br>";
          echo $result;
          echo "</center>";

            }


            else if ($quizes['count'] - $count) {
                $quiz = $quizes['result'][$count];
                


            ?>
                <div class="card-header">
                    <div class="form-group mx-3">
                        <h3 class="px-2 ">Quiz &nbsp;<b class="px-2">#<?php echo $q_id;  ?></b></h3>
                    </div>
                    <b class="text-danger"> Question &nbsp;<?php echo ++$count; ?>&nbsp;:
                        <input hidden name="ques_no" value="<?php echo $count; ?>" disabled>
                        <div class="pl-4"><?php echo $quiz['question']; ?></div>
                    </b>
                </div>
                <div class=" mx-4" style="height: 100%;">

                    <div class="p-4">
                        <div class="form-check p-2">
                            <input class="form-check-input" id="a" type="radio" name="quiz_response" value="a" required>
                            <label class="form-check-label" for="a">
                                <?php echo $quiz['option_a']; ?>
                            </label>
                        </div>
                        <div class="form-check p-2">
                            <input class="form-check-input" id="b" type="radio" name="quiz_response" value="b">
                            <label class="form-check-label" for="b">
                                <?php echo $quiz['option_b']; ?>
                            </label>
                        </div>
                        <div class="form-check p-2">
                            <input class="form-check-input" id="c" type="radio" name="quiz_response" value="c">
                            <label class="form-check-label" for="c">
                                <?php echo $quiz['option_c']; ?>
                            </label>
                        </div>
                        <div class="form-check p-2">
                            <input class="form-check-input" id="d" type="radio" name="quiz_response" value="d">
                            <label class="form-check-label" for="d">
                                <?php echo $quiz['option_d']; ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-primary btn-lg" type="submit" name="submit">Save</button>
                    
                </div>
              
            <?php  } else {  ?>
                <div class="bg-warning text-center p-3 m-3">
                    <h2>Quiz Finished</h2>
                    <a href="<?= base_url('Quizes/hello')?>" class="btn btn-primary" >Generate Result</a>
                </div>
                    <hr>
                    
                </div>
            <?php   } ?>
        </form>
      
    </div>
</div>