<?php

namespace Horus\App\Controllers\Dashboard;

use Horus\Core\Controller;
use Horus\Core\View;

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
        
        View::render('Templates/header.php', [
            'title' => 'Dashboard'
        ]);
        View::render('Templates/footer.php');
    }

}