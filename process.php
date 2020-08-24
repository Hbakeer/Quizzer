<?php include 'database.php'; ?>
<?php session_start();?>
<?php 
    // Check to see if score is set_error_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    if(isset($_POST)){
        $number = $_POST['number'] - 1;
        $selected_choice = $_POST['choice'];
        $next = $_POST['number']+1;
        /*
        *   Get total questions
        */
        $query = "SELECT * FROM questions";

        //Get result
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows - 1;
    

        /*
        *   Get correct choice
        */
        $query = "SELECT * FROM choices
                    WHERE question_number = $number AND is_correct=1 " ;
        
        // Get Result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Get Row
        $row = $result->fetch_assoc();

        //Set Correct Choice
        $correct_choice = $row['id'];

        //Compare
        if($correct_choice == $selected_choice){
            //Answer is correct
            $_SESSION['score']++;
        }

        //Check if last question
        if($number == $total ){
            header("Location: final.php");
            exit();
        }else {
            header("Location: question.php?n=".$next);
        }
    }