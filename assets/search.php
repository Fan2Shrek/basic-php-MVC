<div class='search'>
    <label for='q'>Chercher un film :</label>
    <form action='/search'>
        <input id='q' type='text' name='q' value='<?= $_GET['q'] ?? ''?>' />
    </form>
</div>
