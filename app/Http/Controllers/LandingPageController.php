<?php

namespace App\Http\Controllers;

use App\Models\GoldPrice;
use App\Models\ImportantNote;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $goldPrices = GoldPrice::all();
        $importantNotes = ImportantNote::all();
        $setting  = Setting::first();

        return view('front-view.landing-page.index', compact('goldPrices', 'importantNotes', 'setting'));
    }
}
