 var villes = [ //declarer une variable qui est un tableau, ce tableau contient des villes qu'on va utiliser plus tard.
    "Marrakech", "Casablanca", "Rabat", "Conakry", "Kankan", "Bamako", "Mopti", "Kayes",
    "Paris-Orly", "Paris-CDG", "Paris", "Dakar", "Ziguinchor", "Thiès", "Saint-Louis",
    "Monrovia", "Buchanan", "Bissau", "Bafata", "Freetown", "Bo", "Cotonou", "Parakou",
    "Lomé", "Niamtougou", "Accra", "Kumasi", "Lagos", "Abuja", "Abidjan", "Yamoussoukro",
    "Ouagadougou", "Bobo-Dioulasso", "Banjul", "Farafenni", "Praia", "Mindelo",
    "Niamey", "Agadez", "Nouakchott", "Nouadhibou"
];
// tant que i est inférieur à la taille du tableau, on continue, et on affichera toutes les villes! (Ville: Marrakech....)
for (var i = 0; i < villes.length; i++) {
  console.log("Ville : " + villes[i]);
}
