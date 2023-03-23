<?php
    /**
     * Developed by Saqib Rajput.
     * Email: rajput.saqib@hotmail.com
     * Mobile: 00-92-300-6710419
     * Date: 22/03/2023
     * Time: 21:10
     */

    namespace SR\Leads\Middleware;

    use Closure;
    use Illuminate\Http\Response;

    class ServiceAccessMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure                 $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            if(empty($request->header('service-secret-token')))
            {
                return response()->json(['message' => 'Service Token is Missing.'], Response::HTTP_UNAUTHORIZED);
            }

            // Explode: if you want add multiple secrets 
            $validSecrets = explode(',', env('SERVICE_SECRET'));

            if(in_array($request->header('service-secret-token'), $validSecrets))
            {
                return $next($request);
            }

            return response()->json(['message' => 'Invalid Service Token.'], Response::HTTP_UNAUTHORIZED);
        }
    }
