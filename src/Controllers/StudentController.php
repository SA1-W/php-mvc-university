<?php

require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Core/View.php';
require_once __DIR__ . '/../Core/Access.php';

class StudentController
{
    public function index()
    {
        //students.php
        Access::role([4, 3, 2, 1]);
        // $content = __DIR__ . '/../../views/students/datatable.php';
        // require_once __DIR__ . '/../../views/students/index.php';
        $students = Student::getAll();
        View::render('students/datatable.php', ['students' => $students]);
    }

    public function create()
    {
        //create page.php
        Access::role([3]);
        View::render('students/create.php');
    }

    public function edit()
    {
        //edit page.php
        Access::role([3, 2]);

        $student = new Student();
        $student->id = $_GET['id'];
        $data = $student->getById();
        View::render('students/edit.php', ['data' => $data]);
    }

    public function store()
    {
        //add student
        Access::role([3]);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=students");
            exit;
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $grade = $_POST['grade'];
        $academic_level = $_POST['academic_level'];
        $student_id = $_POST['student_id'];


        $student = new Student();
        $student->name = $name;
        $student->surname = $surname;
        $student->grade = $grade;
        $student->academic_level = $academic_level;
        $student->student_id = $student_id;


        if ($student->create()) {
            $_SESSION['successfully'] = "Successfully Executed!";
            header("Location: index.php?action=students");
            exit;
        };
    }

    public function update()
    {
        //edit student
        Access::role([3, 2]);

        $dataId = $_POST['data_id'];

        if ($_SERVER['REQUEST_METHOD'] !== "POST" || !isset($_POST['PUT'])) {
            $_SESSION['msg'] = "Wrong Method";
            header("Location: index.php?action=edit&id=$dataId");
            exit;
        }

        $student = new Student();

        $student->id = $dataId;

        $student->name = $_POST['name'];
        $student->surname = $_POST['surname'];
        $student->grade = $_POST['grade'];
        $student->academic_level = $_POST['academic_level'];
        $student->student_id = $_POST['student_id'];

        if ($student->update()) {
            $_SESSION['msg'] = "Successfully Updated!";
            header("Location: index.php?action=students");
            exit;
        }
    }

    public function delete()
    {
        //delete student
        Access::role([4, 3]);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['DELETE'])) {
            $_SESSION['msg'] = "Wrong Method";
            header("Location: index.php?action=students");
            exit;
        }

        $student = new Student();
        $student->id = $_POST['data_id'];

        if ($student->delete()) {
            $_SESSION['msg'] = "Successfully Deleted!";
            header("Location: index.php?action=students");
            exit;
        }
    }
}
