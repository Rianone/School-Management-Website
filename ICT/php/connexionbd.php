<?php

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=myabsencemanagementbd', 'root', '');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur ". $e->getMessage());
    }

