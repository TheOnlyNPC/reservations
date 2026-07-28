<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Str;
use Symfony\Component\HttpFoundation\Response;

class ConvertCamelToSnake
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isJson()) {
            $this->replaceKeys($request);
        }

        return $next($request);
    }

    protected function replaceKeys(Request $request)
    {
        $converted = [];
        foreach ($request->all() as $key => $value) {
            $converted[Str::snake($key)] = $value;
        }
        $request->replace($converted);
    }
}
