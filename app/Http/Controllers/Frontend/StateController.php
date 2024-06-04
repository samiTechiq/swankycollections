<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LocalGovernment;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(int $id)
    {
        $locals = LocalGovernment::where('state_id', $id)->get();
        return response()->json($locals);
    }
}
