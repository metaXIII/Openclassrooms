<?php
namespace OCFram;

abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;
  protected $user;
  protected $config;
  protected $viewCache;

  public function __construct()
  {
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);
    $this->user = new User($this);
    $this->config = new Config($this);

    $this->name = '';

    $this->viewCache = new ViewCache();
  }

  public function getController()
  {
    $router = new Router;
    
    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');
    
    $routes = $xml->getElementsByTagName('route');
    
    // On parcourt les routes du fichier XML.
    foreach ($routes as $route)
    {
      $vars = [];

      // On regarde si des variables sont présentes dans l'URL.
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }

      // On ajoute la route au routeur.
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }

    try
    {
      // On récupère la route correspondante à l'URL.
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == Router::NO_ROUTE)
      {
        // Si aucune route ne correspond, c'est que la page demandée n'existe pas.
        $this->httpResponse->redirect404();
      }
    }

    // On ajoute les variables de l'URL au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());

    // On vérifie si la vue index est déjà en cache
    if($view = $this->viewCache->read('View', $this->name.'_'.$matchedRoute->module().'_'.$matchedRoute->action())) {
        // Si c'est le cas, on ne passe pas par le contrôleur
        $this->httpResponse()->send($view);
    }

    // Si la page demandée est le frontend index
    if($this->name === 'Frontend' && $matchedRoute->action() === 'index') {
        $this->viewCache->createCache('View', $this->name.'_'.$matchedRoute->module().'_'.$matchedRoute->action());
    }

    // On instancie le contrôleur.
    $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }

  abstract public function run();

  public function httpRequest()
  {
    return $this->httpRequest;
  }

  public function httpResponse()
  {
    return $this->httpResponse;
  }

  public function name()
  {
    return $this->name;
  }

  public function config()
  {
    return $this->config;
  }

  public function user()
  {
    return $this->user;
  }

  public function viewCache()
  {
      return $this->viewCache;
  }
}