
<?php
require_once(__DIR__ . '/../partials/head.php');
?>

<form method='POST'>
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="name">Nom de pokémon</label>
            <input type="text" name='name' value="<?= $myPokemon->getName() ?>">
            <?php if (isset($this->arrayError['name'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['name'] ?></p>
            <?php
            } ?>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <textarea class="form-control" name="type"><?= $myPokemon->getType() ?></textarea>
            <?php if (isset($arrayError['type'])) {
            ?>
                <p class='text-danger'><?= $arrayError['type'] ?></p>
            <?php
            } ?>
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <input type="description" name='description'><?= $myPokemon->getDescription() ?></textarea>
            <?php if (isset($arrayError['description'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['description'] ?></p>
            <?php
            } ?>
        </div>
  
        <div class="mb-3">
            <label for="level">Level</label>
            <input type="number" name='level' value="<?= $myPokemon->getLevel() ?>">
            <?php if (isset($this->arrayError['level'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['level'] ?></p>
            <?php
            } ?>
        </div>
        <button type="submit" class='btn btn-warning mt-5 mb-5'>Modifier pokemon</button>
    </div>
</form>




<?php
require_once(__DIR__ . '/../partials/footer.php')
?>