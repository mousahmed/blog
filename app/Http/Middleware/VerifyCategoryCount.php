<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;
use Illuminate\Support\Facades\Session;

class VerifyCategoryCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::count() == 0){
            Session::flash('error' , 'You need to add categories to be able to create a post');
            return redirect(route('categories.create'));
    }
        return $next($request);
    }
}
