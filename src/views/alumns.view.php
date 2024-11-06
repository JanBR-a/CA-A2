<?php include 'partials/header.view.php'; ?>

<main>
    <h1>Alumns</h1>
    <hr>
    <form action="subjects" method="POST">
        <div id="noms-containter">
            <label for="nom1">Alumn Name:</label>
            <input type="text" name="items[]" id="nom1"><br>
        </div>
        <button type="button" onclick="addField('alumne')">Add new Alumn</button>
        <button type="submit">Continue</button>
    </form>
</main>
<?php include 'partials/footer.view.php'; ?>