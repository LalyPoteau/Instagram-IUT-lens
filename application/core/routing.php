<?php // Gestion des routes (liens entre urls et code à exécuter)

$routes = [];

define('POST','POST');
define('GET','GET');

function add_page($page,$params=[]){
  global $routes;
  $routes[] = ['name' => $page, 'type' => 'page', 'params' =>$params];
}

function add_action($action,$params=[]){
  global $routes;
  $routes[] = ['name'=> $action, 'type'=> 'action', 'params' => $params];
}

function getParam($name,$method){
  switch($method){
    case GET: $SRC = $_GET;break;
    case POST: $SRC= $_POST;break;
    default: return NULL;break;
  }
  return isset($SRC[$name]) ? $SRC[$name] : NULL;
}

function route(){
  global $routes;
  $action =  isset($_GET['action']) ? $_GET['action'] : NULL;
  $page = NULL;
  if($action !=  NULL) $log = "Action $action demandée<br>\n";// routes :".print_r($routes,true)." <br>\n";
  else {
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';
  }
  if ($page!= NULL) $log = "Page $page demandée<br>\n";// routes :".print_r($routes,true)." <br>\n";

  foreach ($routes as  $route) {
  
    $name = ($route['type'] == 'action') ? $action : $page;

    if ($route['name'] == $name){
      $log .= "Test des routes pour ". print_r($route,true) ."<br> \n";
      $attr = [$route['type']=>$name, 'file'=>"application/$route[type]s/$name.php"];
    
      $valid = true;
      foreach($route['params'] as $name=>$method){
        $optionnal = $name[-1] == '?';
        if ($optionnal) $name = substr($name,0,-1);
        $value = getParam($name,$method);
        if ($value == NULL && !$optionnal){
          $log .= "Paramètre absent : $name ($method)\n\n";
          $valid = false;
          break;
        }
        if ($value != NULL) $attr[$name] = $value;
      }
      if ($valid) return $attr;
    }
  }
  $log .= "Aucune route valide trouvée.\n";
  erreur(404,$log);
}

function erreur($code,$log=""){
  global $blade;
  http_response_code($code);
  echo $blade->run("errors.$code", ['log'=>$log]);
  exit();
}

?>
