<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>🐱 Mini-chat</title>
</head>
<body style="background-color: #eeeeee;">

<nav class="navbar fixed-top navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">🐱 mini-chat !</a>
</nav>

<main>
    <div class="container mt-5">

        <!-- Affichage de chaque message (toutes les données sont protégées par htmlspecialchars) -->
        <section class="row mb-5 my-5">
            <div class="col-12" id="messages">
                <button class="btn btn-primary btn-lg col-4 offset-4 mb-5 my-5" onclick="loadPreviousMessages()" id="previousMessagesBtn">Charger les messages précédents</button>
                <?php require 'partials/messages.php'; ?>
            </div>
        </section>
    </div>
</main>

<div id="talkBar" class="navbar fixed-bottom navbar-dark bg-dark row">
    <form action="api/store.php" method="post" onsubmit="storeMessage(event, this)" class="col-12">
        <div class="input-group">
            <!--
             si un pseudo existe dans le cookie,
             alors renseigne automatiquement la valeur du champ pseudo
             implicitement, si le cookie n'est pas détecté,
             la valeur du champ n'est pas renseignée
            -->
            <input type="text"
                   id="pseudo"
                   class="form-control input-group-addon col-2"
                   name="nickname"
                   placeholder="Pseudo"
                   minlength="2"
                   value="<?= isset($_COOKIE['pseudo']) ? htmlspecialchars(strip_tags($_COOKIE['pseudo'])) : '' ?>"
                   required>
            <input type="text"
                   id="message"
                   class="form-control col-8"
                   name="message"
                   placeholder="Tape ton message ici"
                   minlength="1"
                   maxlength="255"
                   required>
            <button type="submit" class="btn btn-success col-2">Envoyer</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<script src="js/minichat.js"></script>
</body>
</html>