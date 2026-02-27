<?php


require_once __DIR__ . '/../../config/database.php';
Student::$pdo = $pdo;


class Student
{

    public static $pdo;

    public $id;
    public $name;
    public  $surname;
    public $grade;
    public $academic_level;
    public  $student_id;
    public  $created_at;






    public  static function getAll()
    {
        $stmt =  self::$pdo->prepare("SELECT * FROM students");
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_CLASS, 'Student');
        return $students;
    }

    public function getById()
    {
        $stmt = self::$pdo->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $student = $stmt->setFetchMode(PDO::FETCH_CLASS, Student::class);
        $student = $stmt->fetch();
        return $student;
    }

    public function create()
    {

        if (empty($this->name) || empty($this->surname) || empty($this->grade) || empty($this->academic_level) || empty($this->student_id)) {
            $_SESSION['msg'] = "All Field's is Required! Please fill in All Field's";
            header("Location: index.php?action=create");
            exit;
        }

        $stmt = self::$pdo->prepare("INSERT INTO students (name, surname, grade, academic_level, student_id) 
        VALUES (:name, :surname, :grade, :academic_level, :student_id)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':grade', $this->grade);
        $stmt->bindParam(':academic_level', $this->academic_level);
        $stmt->bindParam(':student_id', $this->student_id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update()
    {
        if (empty($this->name) || empty($this->surname) || empty($this->grade) || empty($this->academic_level) || empty($this->student_id)) {
            $_SESSION['msg'] = "All Field's is Required! Please fill in All Field's";
            header("Location: index.php?action=create");
            exit;
        }

        $stmt = self::$pdo->prepare("UPDATE students SET name = :name, surname = :surname, grade = :grade, 
        academic_level = :academic_level, student_id = :student_id WHERE id = :id");
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":grade", $this->grade);
        $stmt->bindParam(":academic_level", $this->academic_level);
        $stmt->bindParam(":student_id", $this->student_id);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {

        $stmt = self::$pdo->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
