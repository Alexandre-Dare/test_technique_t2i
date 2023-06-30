<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Test Technique</title>
</head>
<body>
    <main>
        <div class="alarmes">
            <div class="alarmesPrises">
                <h2>Alarmes Prises : </h2>
                <p></p>
            </div>
            <div class="alarmesLibres">
                <h2>Alarmes Libres : </h2>
                <p></p>
            </div>
        </div>
        <div class="infoDisplay">
            <h2>Infos:</h2>
            <p></p>
        </div>
        <footer>
            <div class="dateTime">
                <?php echo date(DATE_RFC2822); ?>
            </div>
        </footer>
    </main>
</body>
</html>
<script src="assets/app.js"></script>