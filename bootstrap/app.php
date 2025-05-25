<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AgentMiddleware;
use App\Http\Middleware\BloodBankMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
        
       $middleware->alias([
            'designation' => AgentMiddleware::class,
        ]); // Middleware That Guides The Agent Route.
          
        
    })

    ->withMiddleware(function (Middleware $middleware){
       $middleware->alias([
            'seeInventory' => BloodBankMiddleware::class,
        ]); // Middleware That Guides The Blood Bank Accessibility To Inventory Route.
        
    })

    ->withMiddleware(function (Middleware $middleware){
        $middleware->alias([
             'adminRoute' => AdminMiddleware::class,
         ]); // Middleware That Guides The Admin Dasboard Accessibility Route.
         
     })
 

    
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Symfony\Component\Routing\Exception\RouteNotFoundException $e, $request) {
            return response()->json([
                'error' => 'The requested route is not defined. Please check the URL and try again.'
            ], 404);
        });
    })->create();
