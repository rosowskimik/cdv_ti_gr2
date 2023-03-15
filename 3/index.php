<!doctype html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Użytkownicy</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <h4>Użytkownicy z db</h4>

    <table>
        <thead>
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>Data urodzenia</td>
            <td>Miasto</td>
            <td>Województwo</td>
            <td>Państwo</td>
        </thead>
        <tbody>

            <?php
            require_once "../utils/connect.php";

            $result = $db->query(
                "SELECT * FROM users u 
                 INNER JOIN cities c ON u.city_id = c.id 
                 INNER JOIN states s ON c.state_id = s.id 
                 INNER JOIN countries co ON s.country_id = co.id"
            );
            while ($user = $result->fetch_assoc()) {
                echo <<<END
                    <tr>
                        <td>$user[firstName]</td>
                        <td>$user[lastName]</td>
                        <td>$user[birthday]</td>
                        <td>$user[city]</td>
                        <td>$user[state]</td>
                        <td>$user[country]</td>
                    </tr>
                END;
            }
            ?>

        </tbody>
    </table>
</body>

</html>