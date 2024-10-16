<!-- afficher un pokemon -->

<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<h1><?= $pokemon->getName() ?></h1>
<div class="pokemon-card">
<p>Type: <?= $pokemon->getType() ?></p>
<p>Level: <?= $pokemon->getLevel() ?></p>
<p>Description:</p>
<p><?= $pokemon->getDescription() ?></p>
</div>
<?php
require_once(__DIR__ . '/../partials/footer.php')
?>