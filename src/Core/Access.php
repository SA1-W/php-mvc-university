<?php




class Access
{
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
    }

    public static function role(array $roles)
    {
        self::check();
        if (!in_array($_SESSION['user']['role'], $roles)) {
            die("You do not have sufficient permissions to access this page.");
        }
    }
}
