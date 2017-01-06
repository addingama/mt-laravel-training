<?php

namespace App\Http\Controllers\Learn;

use App;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Log;

class PagesController extends Controller {

    public function welcome(Request $request) {
        $locale = App::getLocale();
        // Check cache first
        $page = Cache::get($locale . '_welcome');
        if ($page == null) {
            $page = view('welcome')->render();
            Cache::put($locale . '_welcome', $page, 43200);
            Log::info('tidak ada cache');
        }

        return $page;
    }
}
