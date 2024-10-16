<?php
require_once(__DIR__ . "/partials/head.php");
?>


<h1>Les pokemons</h1>
<div class="container">
    <div class="pokemon-grid">
        <?php
        if(!empty($pokemons)) {
            foreach($pokemons as $pokemon) {
        ?>
            <div class="pokemon-card">
                <h5>Nom: <?= $pokemon->getName() ?></h5>
                <p>Type: <?= $pokemon->getType() ?></p>
                <p>Level: <?= $pokemon->getLevel() ?></p>
                <p>Description:</p>
                <p><?= $pokemon->getDescription() ?></p>
                <a href="/pokemon?id=<?= $pokemon->getId() ?>" class="btn btn-primary">Détails</a>
                <a href="/updatePokemon?id=<?= $pokemon->getId() ?>" class="btn btn-primary">Modifier</a>
                <!-- <button><a href="../Views/pokemon.view.php">envoyer</a></button> -->
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
require_once(__DIR__ . "/partials/footer.php");
?>