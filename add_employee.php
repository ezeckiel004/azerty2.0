<!-- add-employee.php -->

<?php
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    # code...
    $errors = [];

    //récupérer les données du formulaires
    $name = trim($_POST["name"]);
    $fistname = trim($_POST["firstname"]);
    $role_id = $_POST["role_id"];
    $salary = $_POST["salary"];

    //vérifier si les champs sont vides 
    if(empty($name) || empty($fistname) || empty($role_id) || empty($salary)) {
        $errors[] = "Veuillez remplir tous les champs";
    }

    //s'il y a des erreurs, les afficher 
    if(!empty($errors)) {
        echo "<ul>";
        foreach($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        //sinon, ajouter l'employé à la base de données
        include_once 'config.php';
        $insert_query = "INSERT INTO employees (name, firstname, role_id, salary) VALUES ('$name', '$fistname', '$role_id', '$salary')";
        if (mysqli_query($con, $insert_query)) {
            echo "<p>Employé ajouté avec succès.</p>";
            // Réinitialiser les champs du formulaire
            $name = $age = $email = $address = "";
        }else {
            print "L'employé n'a pas été enregistre dans la base de données, une erreur s'est produite";
        }
    }
}

?>

<h2 class="mt-4 mb-4">Ajouter un Nouvel Employé</h2>
<form action="" method="POST">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" class="form-control" id="name" >
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" class="form-control" id="firstname">
    </div>
    <div class="form-group">
        <label for="role_id">Poste</label>
        <select class="form-control" name="role_id" id="role_id" >
        <?php       
        include_once 'config.php';
        $query = "SELECT * FROM roles";
        $results = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($results)) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }

        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="salary">Salaire</label>
        <input type="number" class="form-control" name="salary" id="salary" >
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


