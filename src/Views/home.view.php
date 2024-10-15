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