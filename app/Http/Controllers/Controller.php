<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $count_visited = 0;
    protected $os = null;

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        session_start();

        $this->os = $this->get_operating_system();
        $check = Visitors::where([['operating_sistem', $this->os], ['is_session', 1]])->get();
        if(!isset($_SESSION['visited'])) {
            $_SESSION['visited'] = 'yes';
            $_SESSION['created'] = time();

            $this->count_visited =+ 1;

            $visitor = (!is_null($check->first())) ? Visitors::find($check->first()->id) : new Visitors();
            $visitor->operating_sistem = $this->os;
            $visitor->visitor = (!is_null($check->first())) ? $this->count_visited + $check->first()->visitor : $this->count_visited;
            $visitor->hour = date('H:i:s');
            $visitor->date = date('Y-m-d');
            $visitor->is_session = 1;
            $visitor->save();
        }
        
        if(isset($_SESSION['created'])) {
            $time_reset = date('H:i:s');
            $last_session = $check->first()->hour;
            $determine = explode(':', $time_reset);
            $hour_last_session = explode(':', $last_session);
            if($determine[0] > $hour_last_session[0]) {
                $visitor = !is_null($check->first()) ? Visitors::find($check->first()->id) : new Visitors();
                $visitor->is_session = !is_null($check->first()) ? 0 : 1;
                $visitor->update();

                session_destroy();
                session_unset();
                unset($_SESSION['visited']);
            }
        }

    }

    protected function get_operating_system() {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $operating_system = 'Unknown Operating System';
    
        //Get the operating_system name
        if (preg_match('/linux/i', $u_agent)) {
            $operating_system = 'Linux';
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
            $operating_system = 'Mac';
        } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
            $operating_system = 'Windows';
        } elseif (preg_match('/ubuntu/i', $u_agent)) {
            $operating_system = 'Ubuntu';
        } elseif (preg_match('/iphone/i', $u_agent)) {
            $operating_system = 'IPhone';
        } elseif (preg_match('/ipod/i', $u_agent)) {
            $operating_system = 'IPod';
        } elseif (preg_match('/ipad/i', $u_agent)) {
            $operating_system = 'IPad';
        } elseif (preg_match('/android/i', $u_agent)) {
            $operating_system = 'Android';
        } elseif (preg_match('/blackberry/i', $u_agent)) {
            $operating_system = 'Blackberry';
        } elseif (preg_match('/webos/i', $u_agent)) {
            $operating_system = 'Mobile';
        }
        
        return $operating_system;
    }

}
