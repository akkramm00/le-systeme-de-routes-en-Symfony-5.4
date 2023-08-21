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
   <p>
    Selon les bonnes pratiques , il est recommandé d'écrire son système de routes via les "PHP attributes".Nous verrons ensuite le routing écrit en annotations (qui deviendera deprecated dans la prochaine version majeure) ou encore au format 'YAML' dans le routing avec YAML et débogage de ce cours.
    C'est aussi une syntaxe commune que l'on peut retrouver  dans certains bundles ou anciens projets Symfony.
    Les annotation,s sont utilisées dans la plupart des langages informatiques.ils s'agissait du nom de métadonnées qu'utilisaient PHP avant sa version8, et par extension Symfony.
    Ainsi, depuis PHP 8, bien qu'il soit aussi possible d'utiliser les annotations, les attributs ont été introduits pour remplacer ceux-ci. Les attributs ont l'avantage d'etre maintenant pris nativement en charge par PHP? contrairemnt aux annotations qui nécessitent un logiciel tiers pour les compiler.
    Simplement dit , ne soyez pas étonné si on parle parfois d'annotations dans le routing alors qu'ils'agit d'attributs.

     examples:

  <?php
// Annotraions Routing

@Route("/tasks", name= "task_list")
public function list()
{
  //...
}


  // Attributs routing
  #[Route("/tasks", name: "task_list", methods: ['GET'])]
    public function list()
{
  //...
}

?>

     Pour que le système d'annotaions fonctionne , il faut installer le bundle suivant à l'aide du terminal de commande:

    $  composer require doctrine/annoptations
   </p> 

    <h2>Importer un namespace</h2>
    <p>
      Il est nécessaire à present d'inmporter un namespace en utilisant cette commande dans chaque classe de controller .

      " use Symfony\Component\Routing\Annotation\Route "
      Nous avons ainsi configuré tous les éléments nécessaires pour que les annotations des controllers fonctionnent.

      L'enorme avantage d'utiliser les annotations ou les PHP attributes pour le routing plutôt d'utiliser des fichiers dédiés, c'est qu'il n'y a pas besoin de naviguer entre les fichiers controllers et routes, puisque nous pouvons accéder immédiatement à l'information associant la route à un controller.
    </p>

    <h2> Paramètres Route</h2>
    Les paramètres de la fonction d'annotation route définissent les propriétés d'une route. Cette fonction permet de mapper une URL à une action ou une méthode dans le controlleur de l'application.
    En voici quelques-unes :

    Methods:
<?php
    #[Route('/tasks', name: "task_list", methods: ['GET', 'HEAD'])]
    public function  list()
{
  /...
}
  ?>

    Schemes ;
    Schemes permet de spécidier si nous voulons qu'une page soit accéssible en HTTP ou seulement en HTTPS.

    <?php
    #[Route('/tasks', name: "task_list", methods: ['GET', 'HEAD'], schemes:[HTTP])]
    public function  list()
{
  /...
}
  ?>

   Path et son paramètre :
    Le paramètre "path" dans le routage désigne une partie variable d'une URL qui peut etre utilisée pour fournir des informations supplémentaires.

    <h3>Methode</h3>
    paramètre dynamique dans la route :
    Par exemple , dans une liste d'utilisateurs, le paramètre dynamique de path va permettre de récuperer un utilisateur précis. Mais bien sûr il ne serait pas raisonnable de créer un eroute par utilisateur, imaginons qu'ily'en ait des milliers! On a donc besoin d'un "paramètre dynamique"
    Pour cela , on utilise le nom de la propriété d'identification, encadré avec des accolades. Id est souvent utilisé mais on peut la nommer autrement.

    
    <?php
  #[Route('/user/{name}')]

// il est possible d'ajouter le paramétre par defauts à la route avec une valeur par defauts. Ce paramètre fait référence au paramètre de path.

#[Route('/user/{name}' , defaults: ['name' => 'john'])]

// on peut utiliser cette syntaxe minifiée:
#[Route('/user/{name?john}')]
  
  ?>

    <h1>Récuperation du paramètre dans le controller</h1>

    <p>
      Comment récupérer le paramètre dans le controller ? Par exemple avec "attributes-get()"de request.
      
      <?php
  #[Route('/user/name' , defaults: ['name' =>'john'])]
  public function show(Request $request)
  {
    $title = $request->attributes->get('name');
    //...
  }

  ?>
Cependant, Symfony ,qui utilise Doctrine(son ORM) est très efficace. Vous pouvez simplement préciser la propriété dans les paramètres de la fonction et il sera capable de comprendre seul ce qu'il doit chercher , grace au typage du paramètre. C'est ce qu'on appelle au "ParaConverter".

      
    </p>
    <?php
  #[Route('/user/name' , defaults: ['name' =>'john'])]
  public function show(Request $request, $name)
  {
   
    //...
  }

  ?>
    
    
    
    
 
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>