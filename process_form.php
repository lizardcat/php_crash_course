<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
} else {
    echo "Please submit the form.";
}
?>