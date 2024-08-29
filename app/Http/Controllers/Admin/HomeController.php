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
        // Retrieve the authenticated user
        $user = auth()->user();

        // Get the total number of active learners for the user's branch
        $totalLearners = Learners::where('status', 'active')
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->count();

        // Get the number of learners without a NEMIS code for the user's branch
        $learnersWithoutNemisCode = Learners::where(function ($query) {
                $query->where('nemis_code', 'None')
                    ->orWhereNull('nemis_code');
            })
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->count();

        // Get the number of inactive learners for the user's branch
        $learnersInactive = Learners::where('status', 'inactive')
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->count();

        // Get the number of transferred learners for the user's branch
        $learnersTransferred = Learners::where('status', 'Transferred')
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->count();

        // Get the most recently added or updated learners for the user's branch, limited to 10
        $recentLearners = Learners::latest('updated_at')
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->take(10)
            ->get();

        // Prepare the data for the view
        $pageData = [
            'totalLearners' => $totalLearners,
            'learnersWithoutNemisCode' => $learnersWithoutNemisCode,
            'learnersInactive' => $learnersInactive,
            'learnersTransferred' => $learnersTransferred,
            'recentLearners' => $recentLearners, 
        ];

        // Return the view with the prepared data
        return view('admin.index', $pageData);
    }

}
