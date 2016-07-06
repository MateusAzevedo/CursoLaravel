<?php

namespace CursoLaravel\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware;
use LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware;
use LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware;
use LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware;
use LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \CursoLaravel\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        OAuthExceptionHandlerMiddleware::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \CursoLaravel\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \CursoLaravel\Http\Middleware\RedirectIfAuthenticated::class,
        'csrf' => \CursoLaravel\Http\Middleware\VerifyCsrfToken::class,
        'oauth' => OAuthMiddleware::class,
        'oauth-user' => OAuthUserOwnerMiddleware::class,
        'oauth-client' => OAuthClientOwnerMiddleware::class,
        'check-authorization-params' => CheckAuthCodeRequestMiddleware::class,
    ];
}
