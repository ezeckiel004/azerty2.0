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
        if (mysqli_connect($con, $insert_query)) {
            # code...
            print "L'employé a été enregistre dans la base de données";
        }else {
            print "L'employé n'a pas été enregistre dans la base de données, une erreur s'est produite";
        }
    }
}

?>

<h2 class="mt-4 mb-4">Ajouter un Nouvel Employé</h2>
<form action="index.php" method="post">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" placeholder="Entrez le nom" >
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" class="form-control" id="firstname" placeholder="Entrez le prénom">
    </div>
    <div class="form-group">
        <label for="role">Poste</label>
        <select class="form-control" id="role">
            <!-- Options pour les différents postes -->
            <option value="1">Admin</option>
            <option value="2">Manager</option>
            <option value="3">User</option>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select>
    </div>
    <div class="form-group">
        <label for="salary">Salaire</label>
        <input type="number" class="form-control" id="salary" placeholder="Entrez le salaire">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
