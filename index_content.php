<?php
// Inclure le fichier de connexion à la base de données
include_once 'config.php';
print_r($conn);
// Récupérer la liste des employés depuis la base de données
$query = "SELECT * FROM employees";
print_r($query);
$result = mysqli_query($conn, $query);
print_r($result);
?>

<h2 class="mt-4 mb-4">Liste des Employés</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Role</th>
            <th scope="col">Salaire</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Boucle PHP pour afficher la liste des employés -->
        <?php foreach ($result as $row): ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['name'] . ' ' . $row['firstname']; ?></td>
                <td><?php echo $row['role_id']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Voir</a>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
