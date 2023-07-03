<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // قم بتنفيذ التحقق هنا للتأكد من صلاحية المستخدم كـ "دكتور"
        if ($request->user() && $request->user()->role == 'doctor') {
            // إذا تم التحقق بنجاح، قم بالسماح بالوصول إلى المسارات المحمية للدكتور
            return $next($request);
        }

        // إذا لم يتم التحقق، قم بتوجيه المستخدم إلى المسار المناسب مثل صفحة تسجيل الدخول
        return redirect('/login')->with('error', 'يجب عليك تسجيل الدخول كـ دكتور للوصول إلى هذه الصفحة.');
    }
}
