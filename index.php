<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Routing</h1>

  <p>
    Dans une application moderne qui suit le MVC(Model-Vue-Controller), il est nécessaire de mettre en place coté "back-end" un système qui permet un navigation cohérente entre les pages. Ce système s'applle "le Routing".

    Le routing ou "routage " , permet de définir comment les "URL" d'une application doivent etre mappées.
    Quant au mapping des URL , il s'agit du processus consistant à associer une URL à une action spécifique
  En effet, à chaque requêteHTTP, l'application doit savoir non seulement quelle route est active mais aussi quelle méthode de controleur est associée.
    Une route peut également contenir des paramètres qui permettent aux controlleursde fournir des informations pécises. Ainsi, le routing est important pour améliorer l'experience utilisateur, car il permet de fournir des "URL" claires et indexées par les moteurs de recherches.

    Le fraùwork Sumfony fournit bien evidement les outils adaptés pour maitriser le routing. Mais comment fonctionne-t-il? Quelles sont les erreurs à éviter?
    C'est ce que nous aborderons à travers ce cours sur le routing dans Symfony 5.4 .
  </p>

    <h2>Configuration routing avec annotations</h2>
    Selopn les bonnes pratiques , il est recommandé d'écrire son système de routes via les "PHP attributes".Nous verrons ensuite le routing écrit en annotations (qui deviendera deprecated dans la prochaine version majeure) ou encore au format 'YAML' dans le routing avec YAML et débogage de ce cours.
    C'est aussi une syntaxe commune que l'on peut retrouver  dans certains bundles ou anciens projets Symfony.
    Les annotation,s sont utilisées dans la plupart des langages informatiques.ils s'agissait du nom de métadonnées qu'utilisaient PHP avant sa version8, et par extension Symfony
 
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>