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
        $totalLearners = Learners::where('status', 'active')->count();
        $learnersWithoutNemisCode = Learners::where('nemis_code', 'None')
        ->orWhereNull('nemis_code')
        ->count();
        $learnersInactive = Learners::where('status', 'inactive')->count();
        $learnersTransferred = Learners::where('status', 'Transferred')->count();

        // Get the most recently added or updated learners, limited to 10
        $recentLearners = Learners::latest('updated_at')
            ->take(10)
            ->get();

        $pageData = [
            'totalLearners' => $totalLearners,
            'learnersWithoutNemisCode' => $learnersWithoutNemisCode,
            'learnersInactive' => $learnersInactive,
            'learnersTransferred' => $learnersTransferred,
            'recentLearners' => $recentLearners, 
        ];

       

        return view('admin.index', $pageData);
    }
}
