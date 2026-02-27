<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Grade</th>
            <th scope="col">Academic Level</th>
            <th scope="col">Student_ID</th>
            <th colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student->id ?? 'No data' ?></td>
                <td><?= $student->name ?? 'No data' ?></td>
                <td><?= $student->surname  ?? 'No data' ?></td>
                <td><?= $student->grade ?? 'No data' ?></td>
                <td><?= $student->academic_level ?? 'No data' ?></td>
                <td><?= $student->student_id ?? 'No data' ?></td>
                <td><a href="#" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="index.php?action=edit&id=<?= $student->id ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a></td>
                <td>
                    <form action="/oop_project_2/public/index.php?action=delete" method="POST">
                        <input name="DELETE" type="hidden">
                        <input name="data_id" type="hidden" value="<?= $student->id ?>">
                        <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i> </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>