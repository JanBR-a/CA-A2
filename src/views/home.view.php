<?php include 'partials/header.view.php'; ?>

<main>
    <h1>Professors</h1>
    <hr>
    <form action="alumnes" method="POST">
        <div id="noms-containter">
            <label for="nom1">Professor Name:</label>
            <input type="text" name="items[]" id="nom1"><br>
        </div>
        <button type="button" onclick="addField('professor')">Add new Professor</button>
        <button type="submit">Continue</button>
    </form>
</main>
<?php include 'partials/footer.view.php'; ?>