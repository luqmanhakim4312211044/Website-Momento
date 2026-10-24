<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Menambah header keamanan dasar pada semua respons halaman.
 *
 * - X-Frame-Options: halaman tidak boleh ditanam di <iframe> situs lain (anti-clickjacking).
 * - X-Content-Type-Options: browser tidak menebak tipe file sendiri.
 * - Referrer-Policy: URL lengkap (termasuk path dashboard) tidak dikirim ke situs lain.
 * - Strict-Transport-Security: browser selalu memakai HTTPS untuk situs ini (hanya di production).
 *
 * Content-Security-Policy sengaja tidak dipasang: situs ini memakai banyak style/onmouseover
 * inline, Google Maps, dan sweetalert dari CDN, jadi CSP yang ketat akan merusak tampilan.
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Browser mengabaikan HSTS yang diterima lewat HTTP biasa, jadi aman dikirim di semua respons production.
        if (app()->isProduction()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000');
        }

        return $response;
    }
}
