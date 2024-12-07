<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if ($session->get('logged_in') != TRUE) {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();

        $uri = $request->getUri()->getPath();

        // Allow these URIs when logged in
        $allowedUris = [
            '/',
            'home',
            'webpage',
            'webpage/home',
            'webpage/about',
            'webpage/membership',
            'lagu',
            'lagu/index',
            'lagu/create',
            'lagu/save',
            'lagu/edit',
            'lagu/delete',
            'lagu/detail',
            'logout',
            'CtrlrLagu',
            'CtrlrLagu/index',
            'CtrlrLagu/create',
            'CtrlrLagu/save',
            'CtrlrLagu/edit',
            'CtrlrLagu/delete',
            'CtrlrLagu/detail',
            'CtrlrLagu/update',
            'user',
            'user/index',
            'CtrlrUser/index',
        ];

        // Redirect to /home only if the current URI is not in the allowed list
        if ($session->get('logged_in') == TRUE && !in_array($uri, $allowedUris)) {
            return redirect()->to('webpage/home');
        }
    }
}
