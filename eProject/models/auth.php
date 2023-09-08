<?php

class Auth
{
    function findUserWithEmailParent($email, $pdo)
    {
        $query = $pdo->prepare('select * from parent_login where parentEmail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function findUserWithEmailHospital($email, $pdo)
    {
        $query = $pdo->prepare('select * from hospital_login where hospitalEmail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function findUserWithEmailAdmin($email, $pdo)
    {
        $query = $pdo->prepare('select * from admins where adminEmail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function register($name, $email, $password, $pdo)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $pdo->prepare('insert into parent_login (parentName, parentEmail, parentPassword) values(:name, :email, :password)');
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
    }

    function registerHospital($name, $email, $password, $location, $pdo)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $pdo->prepare('insert into hospital_login (hospitalName, hospitalEmail, hospitalPassword, hospitalLocation) values(:name, :email, :password, :location)');
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':location', $location);

        $query->execute();
    }

    function childFormSubmit($childName, $Gender, $dateOfBirth, $hospital, $vaccine, $appointment, $parentID, $phone, $pdo)
    {
        $query = $pdo->prepare('insert into children_details 
    (childName,childGender,childAge,hospitalID,vaccineID,vaccinationDate,parentID,contact)
     values (:name,:gender,:age,:hospital,:vaccine,:date,:parentID,:contact)
    ');
        $query->bindParam(':name', $childName);
        $query->bindParam(':gender', $Gender);
        $query->bindParam(':age', $dateOfBirth);
        $query->bindParam(':hospital', $hospital);
        $query->bindParam(':vaccine', $vaccine);
        $query->bindParam(':date', $appointment);
        $query->bindParam(':parentID', $parentID);
        $query->bindParam(':contact', $phone);
        $query->execute();
    }
}

?>