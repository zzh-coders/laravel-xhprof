<?php


namespace Zehua\LaravelXhprof\Middleware;


use Closure;
use Zehua\LaravelXhprof\Xhprof;

class StartXhprof
{
    protected $manager;


    public function __construct(Xhprof $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->manager->start();

        return $next($request);
    }

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Symfony\Component\HttpFoundation\Response $response
     *
     * @return void
     */
    public function terminate($request, $response)
    {
        $this->manager->end($request);
    }

}