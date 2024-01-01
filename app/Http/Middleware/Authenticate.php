<?php

namespace App\Http\Middleware;

use App\Utils\ApiResponder;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    use ApiResponder;

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


      /*  $tkn='INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC';

       $tkn2='J5RfUoEAAMENQ0rINTAR2QYV9JyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOCw4aITvFVOXY8whho3qZOC';

        if ($request->header('noBody')==$tkn||$request->header('noBody')==$tkn2)
        {
            return $next($request);
        }
        else
        {
            return $this->errorResponse(['message' => 'No api key provided or invalid', 'headers' => $request->header()], 404);
        }*/


        return $next($request);

    }
}
