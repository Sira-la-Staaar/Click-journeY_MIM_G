<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="stylesheet.css">
		<title>Une page spécifique pour rechercher des voyages avec plusieurs champs de filtrage (dates, lieux, options, ...)</title>
	</head>
	<body class="Vols" style="background: url('https://media.istockphoto.com/id/1057333524/fr/photo/kasbah-ait-ben-haddou-dans-le-d%C3%A9sert-pr%C3%A8s-de-montagnes-de-latlas-maroc.jpg?s=612x612&w=0&k=20&c=Zcr5WKI1URXHrsYqBFdydkW0EywJdJXRqKyb4MBzqjc=') no-repeat center center fixed; background-size: cover;">
	<img src="logo4.png" alt="logo de The West Agency" style="float: right; margin: 20px; width: 400px;">    
<form action="recapitulatif.php" method="GET"> 
<p>D'ou partez-vous?</p>
   <select name="ville_depart" id="ville_depart">
   <optgroup label="Maroc">
<option value="Marrakech">Marrakech</option>
<option value="Casablanca">Casablanca</option>
    </optgroup>
  <optgroup label="Guinee">
<option value="Conakry">Conakry</option>
<option value="Kankan">Kankan</option>
   </optgroup>
  <optgroup label="Mali">
<option value="Bamako">Bamako</option>
<option value="Mopti">Mopti</option>
    </optgroup>
    <optgroup label="Senegal">
<option value="Dakar">Dakar</option>
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
<option value="Lome">Lome</option>
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
                  <optgroup label="Le cap vert">
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
     </optgroup>
  <optgroup label="Guinee">
<option value="Conakry">Conakry</option>
<option value="Kankan">Kankan</option>
    </optgroup>
  <optgroup label="Mali">
<option value="Bamako">Bamako</option>
<option value="Mopti">Mopti</option>
    </optgroup>
    <optgroup label="Senegal">
<option value="Dakar">Dakar</option>
<option value="Saint-Louis">Saint-Louis</option>
      </optgroup>
      <optgroup label="Liberia">
<option value="Monrovia">Monrovia</option>
<option value="Buchanan">Buchanan</option>
        </optgroup>
        <optgroup label="Guinee Bissau">
<option value="Bissau">Bissau</option>
<option value="Bafatá">Bafata</option>
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
<option value="Lomé">Lome</option>
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
                  <optgroup label="Le cap vert">
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

	<p>Choisissez la date et l'heure de votre vol:</p> 
Le mois: <input type="month" name="month" value="2025-03" min="2025-03" max="2025-12" required><br> 
La semaine: <input type="week" name="week" value="2025-W09" min="2025-W09" max="2025-W52"required><br>
La date: <input type="datetime-local" name="time2" value="2025-03-01T12:00" min="2025-03-01T12:00" max="2025-12-31T11:59"required><br>

	<p>Combien de voyageurs ?</p>
<input type="number" name="voyageurs" min="1" max="10" value="1" required>
	<p>Deux bagages de 23 kg par personne sont autorisés.</p>
	
	<button type="submit">Rechercher</button>    
    </form>
		
    <!-- nombre de voyageurs avec valises (deux bagages de 23 kg par personne!! regarder pourquoi date n'est pas limite, ajouter un css pour ca. Enlevez se connecter avec facebook!!!! relier tous les css ensemble!-->
    
		

<footer class="footer2">
        <div class="pied1"><br><img class="pied11" src="logo5.png" alt="logo de The West Agency"/><br><br> * Selon les conditions tarifaires propres à chaque produit et précisées ci-après : <br><br>
          - Vols : Tarifs TTC par personne et « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation de la compagnie aérienne<br><br>
          - Séjours : Tarifs TTC, hors taxes de séjour, par personne sur base d'une chambre double. Prix « à partir de » valables à certaines dates et sous réserve de disponibilités et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Week-ends : Tarifs TTC hors taxes de séjours, indiqués par personne « à partir de », valables à certaines dates et sous réserve de disponibilité et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Locations : Tarifs TTC par logement et par semaine (sauf mention contraire), « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation.<br><br>
          - Hôtels : Tarifs TTC par nuit et par chambre « à partir de », valables à certaines dates, sur la base d'une chambre double, hors taxes de séjour, ajustables en fonction du taux de change, sous réserve de disponibilité et de confirmation.<br><br>
          - Voiture : Tarifs TTC « à partir de », par jour et pour un petit véhicule, hors suppléments, valables à certaines dates et sous réserve de disponibilité et de confirmation.<br><br>
          - Croisières : Tarifs TTC par personne « à partir de », hors taxes de séjours, valables à certaines dates et sous réserve de disponibilité.<br><br><br>
          
          © 2024-2025 TheWestAgency. Tous droits réservés - société soumise au droit français, inscrite au registre du commerce de Paris, Cergy 95000, dont le siège social est à l’avenue du Parc, immatriculée au Registre des opérateurs de voyages et de séjours auprès d’Atout France sis 79/81 rue de Clichy 75009 Paris, sous le numéro IM099170015, agréée IATA. 
          Si vous avez soumis une réclamation auprès de notre Service Client, mais que notre réponse ne vous satisfait pas : vous pouvez contacter la Médiation Tourisme et Voyage sur leur site www.mtv.travel ou par voie postale MTV Médiation Tourisme Voyage BP 80 303 75 823 Paris cedex 17. Vous pouvez nous contacter au sujet de votre remboursement dès maintenant via notre Centre d'aide ou contactez nos agents ici.
           <br> <br>
          Laissez-nous votre avis ! <br> <br><a href="https://feedback.emplifi.io/?lID=2&rn=131521&vm=1&pID=5&hs1=102214&hs2=102226&uni=1&siteID=1&am=true&referrer=Link&sdfc=355b766d-131521-c733c77b-141a-42d7-be9f-2e52b426622b&source=102226"><button class="pied1"><strong>Laisser un commentaire</strong></button></a></div>
    </footer>
	  
  </body>
</html>
