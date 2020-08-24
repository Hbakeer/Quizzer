<?php include'database.php'; ?>
<?php
/*
*  Get total number of questions
*/
    $query = "SELECT * FROM questions";
    // Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>PHP Quizzer</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Test your PHP knowleadge</h2>
                <p>This is a multiple choice quiz to test your knowleadge of PHP</p>
                <ul>
                    <li><strong>Number of questions : </strong><?php echo $total; ?></li>
                    <li><strong>Type : </strong>Multiple Choice</li>
                    <li><strong>Estimated Time : </strong><?php echo $total * .5 ?> Minutes</li>
                </ul>
                <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2019, PHP Quizzer
            </div>
        </footer>
    </body>
</html>