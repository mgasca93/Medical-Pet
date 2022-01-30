<?php

namespace Horus\App\Controllers\Dashboard;

use Horus\Core\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $session = new \Horus\App\Services\SessionUp();
        if( !$session->exists() ) : 
            redirect('/login');
        endif;
    }

    public function index() {
        debug($_SESSION);
    }

}