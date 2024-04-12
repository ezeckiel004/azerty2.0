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
        <?php
        
        // Récupérer la liste des employés depuis la base de données
        include_once 'config.php';
        $query = "SELECT * FROM employees";
        
        $results = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($results)) {
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['role_id']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Modifier</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Supprimer</a>
            </td>
        </tr>

        <?php
        }
        ?>


    </tbody>
</table>
