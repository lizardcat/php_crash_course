
<script>
    function submitForm(event) {
        event.preventDefault(); 

        const formData = new FormData(document.getElementById('gradeForm'));

        fetch('process_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('result').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    }
</script>


<form id="gradeForm" onsubmit="submitForm(event)">
    <input type="text" name="studentData" placeholder="Enter data like: John=85, Mary=90, Alex=78" 
    style="width: 400px; height: 100px; font-size: 16px;" required>
    <input type="submit" value="Submit">
</form>
<p>Please submit the form.</p>
<div id="result"></div>

