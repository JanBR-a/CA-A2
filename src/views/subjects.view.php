<?php include 'partials/header.view.php'; ?>

<main>
    <h1>Materies</h1>
    <hr>
    <form action="final" method="POST">
        <div id="noms-containter">
            <label for="nom1">Subject Name:</label>
            <input type="text" name="items[]" id="nom1"><br>
        </div>
        <button type="button" onclick="addField('materia')">Add Subject</button>
        <button type="submit">Continue</button>
    </form>
</main>
<?php include 'partials/footer.view.php'; ?>