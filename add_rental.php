<?php
$title = "Ajouter";

require_once 'includes/header.php';
require_once 'db/conn.php';

if ($_SESSION['typecompte'] = "adm") {


    // Ajouter hebergement 
    $results = $crud->getTypeHebergement();
    var_dump($results);

    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $nom = $_POST['nom'];
        $nbplace = $_POST['nbplace'];
        $surface = $_POST['surface'];
        $internet = $_POST['internet'];
        $annee = $_POST['annee'];
        $secteur = $_POST['secteur'];
        $oriention = $_POST['orientation'];
        $etat = $_POST['etat'];
        $description = $_POST['description'];
        $photo = $_POST['photo'];
        $tarif = $_POST['tarif'];

        $res = $crud->inserthebergement(
            $type,
            $nom,
            $nbplace,
            $surface,
            $internet,
            $annee,
            $secteur,
            $oriention,
            $etat,
            $description,
            $photo,
            $tarif
        );
        if (!$res) {
            include('includes/errormessage.php');
        } else {
            include('includes/successmessage.php');
        }
    }


?>

    <div class="w3-container w3-white w3-padding-16">

        <h1 class="text-center">Ajouter Hebergement</h1>

        <form method="post" action="">
            <input type="hidden" name="id" />
            <div class="form-group">
                <label for="firstname">Type hebergement </label>
                <select class="w3-input w3-border" name="type" id="type">
                    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['CODETYPEHEB']; ?>">
                            <?php echo $r['NOMTYPEHEB']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lastname">Nom hebergement </label>
                <input type="text" class="w3-input w3-border" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="dob">Nombre de place</label>
                <input type="number" class="w3-input w3-border" id="nbplace" name="nbplace" value="1" name="Adults" min="1" max="6" required>
            </div>
            <div class="form-group">
                <label for="specialty">Surface </label>
                <input type="number" class="w3-input w3-border" id="surface" name="surface" required>

            </div>
            <div class="form-group">
                <label for="email">Internet</label><br>
                <input type="radio" id="internet" value="1" name="internet"> Oui
                <input type="radio" id="internet" value="0" name="internet"> Non
            </div>
            <div class="form-group">
                <label for="phone">Année </label>
                <input type="number" class="form-control" id="annee" name="annee" required>
            </div>

            <div class="form-group">
                <label for="secteur">Secteur</label>
                <input type="text" class="w3-input w3-border" id="secteur" name="secteur" required>
            </div>
            <div class="form-group">
                <label for="orientation">Oreintation</label>
                <input type="text" class="w3-input w3-border" id="orientation" name="oriention" required>
            </div>
            <div class="form-group">
                <label for="etat">Etat hebergement</label>
                <input type="text" class="w3-input w3-border" id="etat" name="etathebergement" required>
            </div>
            <div class="form-group">
                <label for="dob">Description</label>
                <input type="number" class="w3-input w3-border" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="dob">Photo</label>
                <input type="text" class="w3-input w3-border" id="photo" name="photo" required>
            </div>
            <div class="form-group">
                <label for="tarif">Tarif par semaine </label>
                <input type="number" class="w3-input w3-border" id="tarif" name="tarif" required>
            </div>

            <a href="manage_rental.php" class="btn btn-default">Back To List</a>
            <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
<?php } ?>