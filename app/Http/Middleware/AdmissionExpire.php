<?php

namespace App\Http\Middleware;

use Closure;

class AdmissionExpire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $private_data = '<h1 style="text-align:center;">Online Application for Rechecking is closed.</h1>
    <hr>
    ';
    public function handle($request, Closure $next)
    {
        // $date = date('Y-m-d H:i:s');
        $current_time   = time();
        $stop_time      = '2018-06-11 11:10:00';
        // $stop_time = '2018-06-09 17:07:00';
        if($current_time >= strtotime($stop_time)){
            // return 'Admission Expired';
            die($this->private_data);
            return redirect('quotes');
        }
        return $next($request);
    }
}

