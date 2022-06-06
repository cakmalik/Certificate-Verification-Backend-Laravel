<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class MyAuth{
    public function handle($request, Closure $next)
    {
        $id = Auth::guard('api')->user()->student->id;
        $req = $request->route('student');
        if($id!=$req){
            return response()->json([
                'success' => false,
                'message' => 'Tak Olle Cong, Melihat Punya tetanggamu.'
            ], 401);
        }
        return $next($request);
    }
}