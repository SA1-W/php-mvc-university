<form method="POST" action="/oop_project_2/public/index.php?action=store">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Student's Name</label>
        <input placeholder="Name" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Student's Surname</label>
        <input placeholder="Surname" name="surname" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Student's Grade</label>
        <input placeholder="Grade" name="grade" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Student's Academic Level</label>
        <input placeholder="Academic Level" name="academic_level" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Student's ID</label>
        <input placeholder="student_id" name="student_id" type="text" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-primary" href="index.php?action=students">Back</a>
</form>
<?php

if (!empty($_SESSION['msg'])) {
    echo "<h5 style='color:red;'>" . $_SESSION['msg'] . "</h5>";
    unset($_SESSION['msg']);
}

?>