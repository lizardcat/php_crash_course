// This version uses just one page is much simpler

<form action="simple_form_2.php" method="post">
    <input type="text" name="studentData" placeholder="Enter data like: John=85, Mary=90, Alex=78" 
    style="width: 400px; height: 100px; font-size: 16px;" required>
    <button type="submit">SUBMIT</button>
</form>

<p>Please submit the form.</p>

<?php

if (isset($_POST['studentData'])) {
    $input = $_POST['studentData'];
    $students = explode(',', $input);

    $topStudent = '';
    $topGrade = 0;

    foreach ($students as $student) {
        // Split each entry into name and grade
        list($name, $grade) = explode('=', trim($student));

        // Convert grade to an integer
        $grade = (int) $grade;

        // Check if this student has the highest grade so far
        if ($grade > $topGrade) {
            $topGrade = $grade;
            $topStudent = $name;
        }
    }

    // Output the top student
    echo "Top student is $topStudent with a grade of $topGrade.";
}
?>