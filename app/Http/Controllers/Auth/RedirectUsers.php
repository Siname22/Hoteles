<?php

namespace Illuminate\Foundation\Auth;

trait RedirectUsers {
    /*
     * Get the post register / login redirect path .
     *
     * @return string
     */
    public function redírectPath(){
        if (method_exists($this, 'redirectTo')){
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
