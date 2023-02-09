<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
trait AuthenticatesUsers {
    use RedirectsUsers, ThrottlesLogins;
    /*
     * Show the application's login form.
     * @return \Illuminate\View\View
     */
    public function showLoginForm(){
        return view('auth.login');
    }
    /*
     * Handle a login request to the application
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Validation\ValidationException\RedirectionResponse\Illuminate\Http\JsonResponse
     *
     * \throws \Illminate\Validation\ValidationException
     */
}
