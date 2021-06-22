<?php

namespace App\Http\Controllers;

use App\Events\realtime as EventsRealtime;
use Illuminate\Http\Request;

class Realtime extends Controller
{
    public function notification(Request $request)
    {
        $message = $request->message;
        broadcast(new EventsRealtime($message));

        return "success";
    }
}
