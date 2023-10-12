<!DOCTYPE html>
<html>
<head>
    <title>Test de connexion à la BDD</title>
</head>
<body>
    <?php
    // Paramètres de connexion à la base de données
    $host = 'mysql';  // C'est le nom du service MySQL dans votre configuration Docker
    $dbname = 'dockerCompose';
    $user = 'root';
    $pass = 'root';

    try {
        // Création de la connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si la connexion est réussie, affichez un message
        echo "<h1>Connexion à la base de données réussie !</h1>";

        // Sélectionnez toutes les lignes de la table testBDD
        $query = "SELECT * FROM testBDD";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Affichage des résultats
        echo "<h2>Données de la table testBDD :</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th></tr>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        // En cas d'échec de la connexion, affichez un message d'erreur
        echo "<h1>Erreur de connexion à la base de données :</h1>";
        echo $e->getMessage();
    }

phpinfo();
    ?>
</body>
</html>
