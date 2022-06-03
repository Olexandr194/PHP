<?php

abstract class Middleware
{
    private $next;

    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;

        return $next;
    }

    /**
     * RU: Подклассы должны переопределить этот метод, чтобы предоставить свои
     * собственные проверки. Подкласс может обратиться к родительской реализации
     * проверки, если сам не в состоянии обработать запрос.
     */
    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }
}

/**
 * RU: Это Конкретное Middleware проверяет, существует ли пользователь с
 * указанными учётными данными.
 */
class UserExistsMiddleware extends Middleware
{
    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: This email is not registered!\n";

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Wrong password!\n";

            return false;
        }

        return parent::check($email, $password);
    }
}

/**
 * RU: Это Конкретное Middleware проверяет, имеет ли пользователь, связанный с
 * запросом, достаточные права доступа.
 */
class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === "admin@example.com") {
            echo "RoleCheckMiddleware: Hello, admin!\n";

            return true;
        }
        echo "RoleCheckMiddleware: Hello, user!\n";

        return parent::check($email, $password);
    }
}

/**
 * RU: Это Конкретное Middleware проверяет, не было ли превышено максимальное
 * число неудачных запросов авторизации.
 */
class ThrottlingMiddleware extends Middleware
{
    private $requestPerMinute;
    private $request;
    private $currentTime;

    public function __construct(int $requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->currentTime = time();
    }

    /**
     * RU: Обратите внимание, что вызов parent::check можно вставить как в
     * начале этого метода, так и в конце.
     *
     * Это даёт значительно большую свободу действий, чем простой цикл по всем
     * объектам middleware. Например, middleware может изменить порядок
     * проверок, запустив свою проверку после всех остальных.
     */
    public function check(string $email, string $password): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo "ThrottlingMiddleware: Request limit exceeded!\n";
            die();
        }

        return parent::check($email, $password);
    }
}

/**
 * RU: Это класс приложения, который осуществляет реальную обработку запроса.
 * Класс Сервер использует паттерн CoR для выполнения набора различных
 * промежуточных проверок перед запуском некоторой бизнес-логики, связанной с
 * запросом.
 */
class Server
{
    private $users = [];
    private $middleware;

    /**
     * RU: Клиент может настроить сервер с помощью цепочки объектов middleware.
     */
    public function setMiddleware(Middleware $middleware): void
    {
        $this->middleware = $middleware;
    }

    /**
     * RU: Сервер получает email и пароль от клиента и отправляет запрос
     * авторизации в middleware.
     */
    public function logIn(string $email, string $password): bool
    {
        if ($this->middleware->check($email, $password)) {
            echo "Server: Authorization has been successful!\n";
            // RU: Выполняем что-нибудь полезное для авторизованных
            // пользователей.
            return true;
        }
        return false;
    }

    public function register(string $email, string $password): void
    {
        $this->users[$email] = $password;
    }

    public function hasEmail(string $email): bool
    {
        return isset($this->users[$email]);
    }

    public function isValidPassword(string $email, string $password): bool
    {
        return $this->users[$email] === $password;
    }
}
/**
 * RU: Клиентский код.
 */
$server = new Server();
$server->register("admin@example.com", "admin_pass");
$server->register("user@example.com", "user_pass");
// RU: Все middleware соединены в цепочки. Клиент может построить различные
// конфигурации цепочек в зависимости от своих потребностей.
$middleware = new ThrottlingMiddleware(2);
$middleware
    ->linkWith(new UserExistsMiddleware($server))
    ->linkWith(new RoleCheckMiddleware());
// RU: Сервер получает цепочку из клиентского кода.
$server->setMiddleware($middleware);

do {
    echo "\nEnter your email:\n";
    $email = 'admin@example.com';
    echo "Enter your password:\n";
    $password = 'admin_pass';
    $success = $server->logIn($email, $password);
} while (!$success);