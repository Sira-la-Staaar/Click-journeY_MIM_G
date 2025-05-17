<?php
session_start(); //cela permet de stocker et récupérer des données (comme un panier ou un utilisateur connecté).
?>

<!DOCTYPE html>
<html>
	<head lang="fr">
		<title>Vols | The West Agency</title>
		<link type="text/css" rel="stylesheet" href="stylesheet.css">
    		<link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    		<meta charset="UTF-8" />
    		<meta name="description" content="Vols" />
		<script src="Vols.js" defer></script> // avec "defer" le navigateur attend que la page HTML soit prête, puis execute le JavaScript sinon le navigateur execute le JavaScript tout de suite, avant d’avoir fini de charger le HTML.
	</head>
	<body class="Vols" style="background: url('https://media.istockphoto.com/id/1057333524/fr/photo/kasbah-ait-ben-haddou-dans-le-d%C3%A9sert-pr%C3%A8s-de-montagnes-de-latlas-maroc.jpg?s=612x612&w=0&k=20&c=Zcr5WKI1URXHrsYqBFdydkW0EywJdJXRqKyb4MBzqjc=') no-repeat center center fixed; background-size: cover;">
    <form action="resultat.php" method="GET"> //form c pour commence un formulaire. action="resultat.php" : quand l’utilisateur clique sur “Rechercher”, les infos partent vers resultat.php.
<p>D'ou partez-vous?</p>
   <select name="ville_depart" id="ville_depart"> //select c pour le menu déroulant.
   <optgroup label="Maroc"> //groupe d'option!
<option value="Marrakech">Marrakech</option> //une option que l'utilisateur peut choisir
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

<p>D'ou allez-vous?</p>
   <select name="ville_arrivee" id="ville_arrivee">
   <optgroup label="Maroc">
<option value="Marrakech">Marrakech</option>
<option value="Casablanca">Casablanca</option>
<option value="Rabat">Rabat</option>
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
<option value="Paris">Paris</option>
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

<p>Choisissez votre formule:</p>
<select name="formule">
<option value="economique">economique</option>
<option value="affaire">affaire</option>
<option value="premiere">premiere</option>
</select>
  
  
<p>Type de voyage:</p>
<select name="type-voyage">
<option value="aller-retour">aller-retour</option>
<option value="aller simple">aller simple</option>
</select>
	<button type="submit">Rechercher</button>    
    </form>
		
    
	<p>Choisissez la date de votre vol:</p> 
		
      	<div id="date-aller">
 	 Date aller : <input type="date" name="date_aller" min="2025-03-01" max="2025-12-31"><br>
	</div>

	<div id="date-retour">
 	 Date retour : <input type="date" name="date_retour" min="2025-03-01" max="2025-12-31"><br>
	</div>

	
<?php include 'footer.php'; ?> //pour inserer le footer!

  </body>
</html>
