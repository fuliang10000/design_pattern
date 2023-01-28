<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class Route
{
    protected $handler;

    public function __construct(
        public string $path = '',
        public array  $methods = []
    )
    {
    }

    public function setHandler($handler): self
    {
        $this->handler = $handler;
        return $this;
    }

    public function run()
    {
        call_user_func([new $this->handler->class, $this->handler->name]);
    }

}

class IndexController
{
    public string $name;
    public string $age;
    #[Route(path: "/index_alias", methods: ["get"]), Route(path: "/index", methods: ["get"])]
    public function index(): void
    {
        echo "hello!world" . PHP_EOL;
    }

    #[Route("/test")]
    public function test(): void
    {
        echo "test" . PHP_EOL;
    }

}

class CLIRouter
{
    protected static array $routes = [];

    public static function setRoutes(array $routes): void
    {

        self::$routes = $routes;

    }

    public static function match($path)
    {
        foreach (self::$routes as $route) {
            if ($route->path == $path) {
                return $route;
            }

        }

        die('404' . PHP_EOL);

    }

}

$controller = new ReflectionClass(IndexController::class);
$methods = $controller->getMethods(ReflectionMethod::IS_PUBLIC);

$routes = [];
foreach ($methods as $method) {
    $attributes = $method->getAttributes(Route::class);

    foreach ($attributes as $attribute) {
        $routes[] = $attribute->newInstance()->setHandler($method);
    }
}

CLIRouter::setRoutes($routes);
CLIRouter::match($argv[1])->run();