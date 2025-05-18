<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
$voyages_json = file_get_contents('Data/voyages.json');
$voyages = json_decode($voyages_json, true);

if ($voyages === null) {
    echo "Erreur de lecture JSON.";
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head lang="fr">
    <title>Vols | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme"/>
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" />
    <meta name=”description” content="Vols" />
	</head>
  <script src="JS/theme.js" defer></script>
  <script src="JS/Vols.js" defer></script>
	<body id="Vols">
    <?php include 'header.php'; ?>
      <form action="resultat.php" method="post" id="form-vol">
        <div class="encadre">
        <h1 class="aida1">-------------Vols-------------</h1>
</div>
        <div class="encadre1">
          <br><br>
        <p class="aida3">D'ou partez-vous?</p>
          <select class="btn" name="ville_depart" id="ville_depart">
            <optgroup label="Maroc">
              <option value="Marrakech">Marrakech</option>
              <option value="Casablanca">Casablanca</option>
              <option value="Rabat">Rabat</option>
            </optgroup>
	
            </optgroup>
            <optgroup label="Guinee">
              <option value="Conakry">Conakry</option>
              <option value="Kankan">Kankan</option>
            </optgroup>
            <optgroup label="Mali">
              <option value="Bamako">Bamako</option>
              <option value="Mopti">Mopti</option>
              <option value="Kayes">Kayes</option>
            </optgroup>
            <optgroup label="France">
              <option value="Paris-Orly">Paris-Orly</option>
              <option value="Paris-CDG">Paris-CDG</option>
            </optgroup>
            <optgroup label="Senegal">
            <option value="Dakar">Dakar</option>
              <option value="Ziguinchor">Ziguinchor</option>
              <option value="Thiès">Thiès</option>
              <option value="Saint-Louis">Saint-Louis</option>
            </optgroup>
            <optgroup label="Liberia">
              <option value="Monrovia">Monrovia</option>
              <option value="Buchanan">Buchanan</option>
            </optgroup>
            <optgroup label="Guinee Bissau">
              <option value="Bissau">Bissau</option>
              <option value="Bafata">Bafata</option>
            </optgroup>
            <optgroup label="Sierra leonne">
              <option value="Freetown">Freetown</option>
              <option value="Bo">Bo</option>
            </optgroup>
            <optgroup label="Benin">
              <option value="Cotonou">Cotonou</option>
              <option value="Parakou">Parakou</option>
            </optgroup>
            <optgroup label="Togo">
              <option value="Lomé">Lomé</option>
              <option value="Niamtougou">Niamtougou</option>
            </optgroup>
            <optgroup label="Ghana">
              <option value="Accra">Accra</option>
              <option value="Kumasi">Kumasi</option>
            </optgroup>
            <optgroup label="Nigeria">
              <option value="Lagos">Lagos</option>
              <option value="Abuja">Abuja</option>
            </optgroup>
            <optgroup label="Cote d’Ivoire">
              <option value="Abidjan">Abidjan</option>
              <option value="Yamoussoukro">Yamoussoukro</option>
            </optgroup>
            <optgroup label="Burkina Faso">
              <option value="Ouagadougou">Ouagadougou</option>
              <option value="Bobo-Dioulasso">Bobo-Dioulasso</option>
            </optgroup>
            <optgroup label="Gambie">
              <option value="Banjul">Banjul</option>
              <option value="Farafenni">Farafenni</option>
            </optgroup>
            <optgroup label="Cap vert">
              <option value="Praia">Praia</option>
              <option value="Mindelo">Mindelo</option>
            </optgroup>
            <optgroup label="Niger">
              <option value="Niamey">Niamey</option>
              <option value="Agadez">Agadez</option>
            </optgroup>
            <optgroup label="Mauritanie">
              <option value="Nouakchott">Nouakchott</option>
              <option value="Nouadhibou">Nouadhibou</option>
            </optgroup>
          </select>
<br><br>
        <p class="aida3">D'ou allez-vous?</p>
          <select class="btn" name="ville_arrivee" id="ville_arrivee">
            <optgroup label="Maroc">
              <option value="Marrakech">Marrakech</option>
              <option value="Casablanca">Casablanca</option>
              <option value="Rabat">Rabat</option>
            </optgroup>
	
            </optgroup>
            <optgroup label="Guinee">
              <option value="Conakry">Conakry</option>
              <option value="Kankan">Kankan</option>
            </optgroup>
            <optgroup label="Mali">
              <option value="Bamako">Bamako</option>
              <option value="Mopti">Mopti</option>
              <option value="Kayes">Kayes</option>
            </optgroup>
            <optgroup label="France">
              <option value="Paris-Orly">Paris-Orly</option>
              <option value="Paris-CDG">Paris-CDG</option>
            </optgroup>
            <optgroup label="Senegal">
            <option value="Dakar">Dakar</option>
              <option value="Ziguinchor">Ziguinchor</option>
              <option value="Thiès">Thiès</option>
              <option value="Saint-Louis">Saint-Louis</option>
            </optgroup>
            <optgroup label="Liberia">
              <option value="Monrovia">Monrovia</option>
              <option value="Buchanan">Buchanan</option>
            </optgroup>
            <optgroup label="Guinee Bissau">
              <option value="Bissau">Bissau</option>
              <option value="Bafata">Bafata</option>
            </optgroup>
            <optgroup label="Sierra leonne">
              <option value="Freetown">Freetown</option>
              <option value="Bo">Bo</option>
            </optgroup>
            <optgroup label="Benin">
              <option value="Cotonou">Cotonou</option>
              <option value="Parakou">Parakou</option>
            </optgroup>
            <optgroup label="Togo">
              <option value="Lomé">Lomé</option>
              <option value="Niamtougou">Niamtougou</option>
            </optgroup>
            <optgroup label="Ghana">
              <option value="Accra">Accra</option>
              <option value="Kumasi">Kumasi</option>
            </optgroup>
            <optgroup label="Nigeria">
              <option value="Lagos">Lagos</option>
              <option value="Abuja">Abuja</option>
            </optgroup>
            <optgroup label="Cote d’Ivoire">
              <option value="Abidjan">Abidjan</option>
              <option value="Yamoussoukro">Yamoussoukro</option>
            </optgroup>
            <optgroup label="Burkina Faso">
              <option value="Ouagadougou">Ouagadougou</option>
              <option value="Bobo-Dioulasso">Bobo-Dioulasso</option>
            </optgroup>
            <optgroup label="Gambie">
              <option value="Banjul">Banjul</option>
              <option value="Farafenni">Farafenni</option>
            </optgroup>
            <optgroup label="Cap vert">
              <option value="Praia">Praia</option>
              <option value="Mindelo">Mindelo</option>
            </optgroup>
            <optgroup label="Niger">
              <option value="Niamey">Niamey</option>
              <option value="Agadez">Agadez</option>
            </optgroup>
            <optgroup label="Mauritanie">
              <option value="Nouakchott">Nouakchott</option>
              <option value="Nouadhibou">Nouadhibou</option>
            </optgroup>
          </select>
          <br><br>
          <p class="aida3">Choisissez votre formule:</p>
          <select class="btn" name="formule">
            <option value="economique">economique</option>
            <option value="affaire">affaire</option>
            <option value="premiere">premiere</option>
          </select>
          <br><br>
          <p class="aida3">Type de voyage:</p>
          <select class="btn" name="type-voyage" onchange="afficherChamps()">
            <option value="aller-retour">aller-retour</option>
            <option value="aller simple">aller simple</option>
          </select>
          <br><br>
          <p class="aida3">Choisissez la date du vol:</p> 
          <?php $today = date('Y-m-d');     // ex. 2025-05-18?>
          <div id="date-aller">
            <label for="aller" class="sol">Date aller :</label>
            <input type="date" class="btn" id="aller" name="date_aller" min="<?= $today ?>" max="2025-12-31" required>
          </div>
          <!-- Bloc date retour -->
          <div id="date-retour">
            <label for="retour" class="sol">Date retour :</label>
            <input type="date" class="btn" id="retour" name="date_retour" min="<?= $today ?>" max="2025-12-31">
          </div>
          <br><br>
          <label for="voyageurs">Nombre de voyageurs :</label>
          <input type="number" id="voyageurs" name="voyageurs" min="1" max="10" value="1">
          <p>-À noter: <span id="valises">chaque voyageur bénéficie de l'inclusion de deux valises de 23 kg chacune!</span></p>
          <button class="btn-details" type="submit">Rechercher</button>    
      </form>    
	  </div> 
</div>
</div>
    <?php include 'footer.php'; ?>
  </body>
</html>
