<?php

//namespace Laravel\Fortify\Http\Responses;
namespace App\Http\Responses;

use FontLib\Table\Type\name;use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {

        return redirect('/order');

        //return $request->wantsJson()
        //            ? new JsonResponse('', 201)
        //            : redirect()->intended(config('fortify.home'));
    }
}
