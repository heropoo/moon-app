<?php
namespace xxdx;

use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

/**
 * Application
 * User: yy
 * Date: 17-3-8
 * Time: 上午12:37
 */
class Application
{
    protected $rootPath;
    protected $configPath;
    protected $appPath;

    protected $config = [];

    protected $errorReportingLevel = E_ALL;
    protected $debug = false;
    protected $charset = 'UTF-8';

    public function __construct($rootPath, $configPath = null, $appPath = null)
    {
        if(!is_dir($rootPath)){
            throw new Exception("Directory '$rootPath' is not exists!");
        }

        $this->rootPath = realpath($rootPath);

        if(!is_null($configPath)){
            if(!is_dir($configPath)){
                throw new Exception("Directory '$configPath' is not exists!");
            }
            $this->configPath = realpath($configPath);
        }else{
            $this->configPath = $this->rootPath.'/config';
        }

        Config::setConfigDir($this->configPath);
        $this->config = Config::get('app');

        if(!is_null($appPath)){
            if(!is_dir($appPath)){
                throw new Exception("Directory '$appPath' is not exists!");
            }
            $this->appPath = realpath($appPath);
        }else{
            $this->appPath = $this->rootPath.'/app';
        }

        App::$app = $this;
    }

    public function enableDebug($errorReportingLevel = E_ALL){
        $this->errorReportingLevel = $errorReportingLevel;
        $this->debug = true;
        return $this;
    }

    public function run(){

        Debug::enable($this->errorReportingLevel , $this->debug);
        ExceptionHandler::register($this->debug, $this->charset);
        //DebugClassLoader::enable();

        // create the Request object
        $request = Request::createFromGlobals();

        $routes = Route::getRouteCollection();

        $matcher = new UrlMatcher($routes, new RequestContext());

        $dispatcher = new EventDispatcher();
        // ... add some event listeners
        $dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));

        // create your controller and argument resolvers
        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();

        // instantiate the kernel
        $kernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);

        // actually execute the kernel, which turns the request into a response
        // by dispatching events, calling a controller, and returning the response
        $response = $kernel->handle($request);

        // send the headers and echo the content
        $response->send();

        // triggers the kernel.terminate event
        $kernel->terminate($request, $response);
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, 'get') === 0) { //get protected attribute
            $attribute = lcfirst(substr($name, 3));
            if (isset($this->$attribute)) {
                return $this->$attribute;
            }
        }
        throw new Exception('Call to undefined method ' . get_class($this) . '::' . $name . '()');
    }
}