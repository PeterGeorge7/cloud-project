<?php

namespace App\Classes\Team;

class Members
{
    private $conn;
    public function __construct()
    {
        $this->conn = \App\DB::connect();
    }
    public function allmembers()
    {
        $sql = "SELECT * FROM team";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return require "../View/members.php";
    }

    public function MemberForm()
    {
        return require "../View/RegistMemberForm.php";
    }
    public function storeMember()
    {
        # save data from post request
        # pid 
        $pid = intval($_POST['pid']);
        $pname = $_POST['pname'];
        $prole = $_POST['prole'];
        $section_period = $_POST['section_period'];

        // Validate input data
        if (empty($pid) || empty($pname) || empty($prole) || empty($section_period)) {
            // Handle validation error
            // return require "RegistMemberForm.php?error=All fields are required. Please try again.";
            header("Location: /team/member/register?error=All fields are required. Please try again.");
        }

        if ($section_period != 3 && $section_period != 4) {
            // Handle validation error
            // return require "RegistMemberForm.php?error=Section period must be 3 or 4. Please try again.";
            header("Location: /team/member/register?error=Section period must be 3 or 4. Please try again.");
        }

        // Continue with storing the member
        try {
            $sql = "INSERT INTO team (pid, pname, prole, section_period) VALUES (:pid, :pname, :prole, :section_period)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':pid', $pid);
            $stmt->bindParam(':pname', $pname);
            $stmt->bindParam(':prole', $prole);
            $stmt->bindParam(':section_period', $section_period);
            $stmt->execute();
        } catch (\PDOException $e) {
            // return require "RegistMemberForm.php?error=Failed to register member. Please try again.";
            header("Location: /team/member/register?error=Failed to register member. Please try again.");
        }

        # check if the latest member is stored
        if ($stmt->rowCount() > 0) {
            // return require "RegistMemberForm.php?error=Member registered successfully.";
            header("Location: /team/MemberRegistered");
        } else {
            // return require "RegistMemberForm.php?error=Failed to register member. Please try again.";
            header("Location: /team/member/register?error=Failed to register member. Please try again.");
        }

        // return require "../View/MemberRegister.php";
    }
    public function MemberRegistered()
    {
        return require "../View/MemberRegistered.php";
    }

    public function deleteMember()
    {
        session_start();
        if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $_POST['csrf_token']) {
            // CSRF token is invalid, handle error (e.g., show an error message and don't process the request)
            exit("CSRF token validation failed");
        }
        // Sanitize and validate input data pid
        $pid = intval($_POST['pid']);
        if (empty($pid)) {
            // Handle validation error
            exit("Invalid input data");
        }

        # first check if it is a valid member
        $sql = "SELECT * FROM team WHERE pid = :pid";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            // Handle error
            exit("Member not found");
        }
        try {
            $sql = "DELETE FROM team WHERE pid = :pid";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':pid', $pid);
            $stmt->execute();
        } catch (\PDOException $e) {
            // Handle error
            exit("Failed to delete member");
        }
        header("Location: /team/members");
    }
}
