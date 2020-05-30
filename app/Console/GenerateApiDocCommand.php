<?php

namespace App\Console;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Docs\Parameter;
use Illuminate\Routing\Router;

class GenerateApiDocCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'doc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Swager Doc';


    public function handle()
    {
        //$this->blockMessage('Welcome!', 'Starting the installation process...', 'comment');

        $swagger = [
            "swagger" => "2.0",
            "info" => [
                "title" => config('app.doc.title'),
                "version" => config('app.doc.version')
            ],
            "host" => config('app.doc.host'),
            "basePath" => "/",
            "schemes" => [
                "http"
            ],
            "paths" => [],
        ];

        $router = app()->router;

        foreach ($router->getRoutes()->getRoutesByName() as $key => $route){
            if(!is_string($route->getAction()['uses'])){
                continue;
            }
            $controllerClass = Str::parseCallback($route->getAction()['uses'])[0];
            if(method_exists($controllerClass, 'getDocResponses')){
                $method = $route->getActionMethod();
                if($controllerClass===$method) {
                    $method = 'invoke';
                }
                $parameters = [];
                foreach ($route->parameterNames() as $name){
                    $parameters[] = Parameter::string($name)->path()->required();
                }
                foreach ($route->gatherMiddleware() as $middlewareName){
                    if(isset($router->getMiddleware()[$middlewareName])){
                        $middlewareClass = $router->getMiddleware()[$middlewareName];
                        if(method_exists($middlewareClass, 'getDocParameters') && $middlewareClass::getDocParameters($method)){
                            $parameters = array_merge($parameters, $middlewareClass::getDocParameters($method));
                        }
                    }
                    if(isset($router->getMiddlewareGroups()[$middlewareName])) {
                        foreach ($router->getMiddlewareGroups()[$middlewareName] as $middlewareClass){
                            if(method_exists($middlewareClass, 'getDocParameters') && $middlewareClass::getDocParameters($method)){
                                $parameters = array_merge($parameters, $middlewareClass::getDocParameters($method));
                            }
                        }
                    }
                }
                $controller = resolve($controllerClass);
                if (method_exists($controller, 'getDocParameters') && $controller->getDocParameters($method)){
                    $parameters = array_merge($parameters, $controller->getDocParameters($method));
                }
                $summary = '';
                if(method_exists($controllerClass, 'getDocSummary')){
                    $summary = $controllerClass::getDocSummary($method);
                }
                $responses = $controllerClass::getDocResponses($method);
                if($responses){
                    $renderedParameters = [];
                    foreach ($parameters as $parameter) {
                        $renderedParameters[] = $parameter->render();
                    }
                    $uri = '/'.trim($route->uri(), '/');
                    if(!isset($swagger['paths'][$uri])) {
                        $swagger['paths'][$uri] = [];
                    }
                    list($uriFirstPrefix) = explode('/', str_replace('api/', '', trim($uri, '/')));
                    $swagger['paths'][$uri][strtolower($route->methods()[0])] = [
                        "summary" => $summary,
                        "parameters"=> $renderedParameters,
                        "responses"=> $responses->render(),
                        "tags" => [$uriFirstPrefix],
                    ];
                }
            }
        }
        $filename = config('app.doc.file');
        if (file_put_contents($filename, json_encode($swagger)) === false) {
            throw new Exception('Failed to saveAs("' . $filename . '")');
        }

        $this->info('Platform ready! You can now login with your username and password at /backend');
    }
}
