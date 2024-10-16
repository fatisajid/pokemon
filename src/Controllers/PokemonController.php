<?php

namespace App\Controllers;

use App\Models\Pokemon;
use App\Utils\AbstractController;

use function PHPSTORM_META\type;

class PokemonController extends AbstractController
{
   
    public function addPokemon()
    {
        if(isset($_POST["name"])){
            $name = htmlspecialchars($_POST["name"]);
            $type = htmlspecialchars($_POST["type"]);
            $level = htmlspecialchars($_POST["level"]);
            $description = htmlspecialchars($_POST["description"]);

            $this->check('name', $name);
            $this->check('type', $type);
            $this->check('level', $level);
            $this->check('description', $description);

            if(empty($this->arrayError)){

                // Créer un objet Pokemon
                $pokemon = new Pokemon(null, $name, $type, $level, $description);

                // Enregistrer le Pokémon dans la base de données
                if ($pokemon->save()) {
                    // Redirection vers une page de succès ou afficher un message de succès
                    $this->redirectToRoute('/');
                } else {
                    echo "Erreur lors de l'ajout du Pokémon.";
                }
            }


        }
        require_once (__DIR__ . "/../Views/pokemon/createPokemon.view.php");
    }
    public function pokemon()
    {
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $pokemon = new Pokemon($id, null, null, null, null);
            $pokemon = $pokemon->getById();
            if ($pokemon) {
                require_once(__DIR__ . '/../Views/pokemon/pokemon.view.php');
            } else {
                echo "Pokémon non trouvé.";
            }
        } else {
            echo "Aucun ID de Pokémon spécifié.";
        }
    }

    public function updatePokemon()
    {
        if ($_GET['id']) {
            //on met l'id de pokemon dans une variable
            $idPokemon = $_GET['id'];
            //on instancie un nouvelle pokemon avec l'id de pokemon
            $pokemon = new Pokemon($idPokemon, null, null, null, null);
            //on appelle la méthode pour aller chercher le pokemon dans la BDD on met le resulat dans la variable
            $myPokemon = $pokemon->getById();

           

            //Si le pokemon n'existe pas dans la base de donnée alors on redirige vers /home
            if (!$pokemon) {
                $this->redirectToRoute('/');
            }

            if (isset($_POST['name'])) {
                $this->check('name', $_POST['name']);
                $this->check('type', $_POST['type']);
                $this->check('level', $_POST['level']);
                $this->check('description', $_POST['description']);

                if (empty($this->arrayError)) {
                    $name = htmlspecialchars($_POST['name']);
                    $type = htmlspecialchars($_POST['type']);
                    $level = htmlspecialchars($_POST['level']);
                    $description = htmlspecialchars($_POST['description']);
                   

                    $pokemon = new Pokemon($idPokemon, $name, $type, $level, $description);

                    $pokemon->update();
                    $this->redirectToRoute('/');
                }
            }

            require_once(__DIR__ . '/../Views/pokemon/updatePokemon.view.php');
        } else {
            $this->redirectToRoute('/');
        }
    }


}