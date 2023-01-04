<?php
include '../model/db.php';


class show extends DB{

    public function displayData()
    {
        try {
            $query = "SELECT * FROM questions";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            "Erreur" . $e->getMessage();
        }
    }

    }

    $display = new show ();
    $questions = $display->displayData();
    echo json_encode($questions);
    




?>