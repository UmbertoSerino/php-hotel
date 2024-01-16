<!-- Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA:
deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->
<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
// se sei settato e sei uguale ad 1 allora true, senno' false
$parkingFilter = isset($_GET['parking']) && $_GET['parking'] === 1 ? true : false;

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <header>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <form class="d-flex" action="./index.php" method="GET">
                    <div class="mb-3 form-check w-100">
                        <select class="form-select mb-2" aria-label="Default select example" id="parking" name="parking">
                            <option selected value="2">Select parking</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <button type="submit" class="btn btn-primary ms-auto">Submit</button>
                    </div>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <!-- ci creiamo un foreach per inserire i dati -->
                <?php foreach ($hotels as $hotel) { ?>
                <?php if ($hotel['parking'] === false && $parkingFilter === true) {
                    } else { ?>
                <tr>
                    <th scope="row">1</th>
                    <!-- prendiamo i valori che contiene la chiave name -->
                    <td> <?php echo $hotel['name'] ?></td>
                    <td> <?php echo $hotel['description'] ?></td>
                    <!-- se il valore della chiave parking è true, scrivi con parcheggio -->
                    <td> <?php if ($hotel['parking'] === true) {
                                        echo 'Parcheggio disponibile: si';
                                    } else {
                                        echo 'Parcheggio disponibile: no';
                                    } ?></td>
                    <td> <?php echo $hotel['vote'] ?></td>
                    <!-- il punto serve per concatenare le due stringhe -->
                    <td> <?php echo $hotel['distance_to_center'] . ' km' ?></td>
                </tr>
            </tbody>
            <!-- chiusura del for -->
            <?php }
                } ?>
        </table>
    </main>
</body>

</html>