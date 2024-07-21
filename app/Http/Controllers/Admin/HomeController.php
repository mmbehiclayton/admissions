<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Learners;

class HomeController extends Controller
{

    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $totalLearners = Learners::count();
        $learnersWithoutNemisCode = Learners::where('nemis_code', 'None')
        ->orWhereNull('nemis_code')
        ->count();
        $learnersInactive = Learners::where('status', 'inactive')->count();
        $learnersTransferred = Learners::where('status', 'Transferred')->count();

        $pageData = [
            'totalLearners' => $totalLearners,
            'learnersWithoutNemisCode' => $learnersWithoutNemisCode,
            'learnersInactive' => $learnersInactive,
            'learnersTransferred' => $learnersTransferred,
        ];

       

        return view('admin.index', $pageData);
    }
}
