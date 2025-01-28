<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SessionTerm;
use App\Models\Term;
use App\Services\Front\CourseServices;
use App\Services\Front\HomeServices;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $homeService;
    protected $courseService;

    public function __construct(HomeServices $homeService, CourseServices $courseService)
    {
        $this->homeService = $homeService;
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the Courses.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function courses()
    {
        $homeCompactReturn = $this->homeService->homeIndex();
        return view('contents.front.courses.index', $homeCompactReturn);
    }

    public function about()
    {
        $homeCompactReturn = $this->homeService->homeIndex();
        return view('contents.front.about.index', $homeCompactReturn);
    }
    public function contact()
    {
        $homeCompactReturn = $this->homeService->homeIndex();
        return view('contents.front.contact.index', $homeCompactReturn);
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function course($id)
    {
        $courseCompactData = $this->courseService->getCourseInfo($id);

        return view('contents.front.courses.course', $courseCompactData);
    }

    public function viewTerm($id)
    {
        $term = Term::findOrFail($id);

        // Check if the current user is already enrolled in the term
        $isEnrolled = auth()->check() ? Auth::user()->terms()->where('term_id', $id)->exists() : false;

        // Count the connected users with role_id = 3
        $connectedUserCount = $term->connectedUsers()
            ->wherePivot('role_id', 4)
            ->count();

        // Count the total sessions for the term
        $totalSessionCount = SessionTerm::where('term_id', $id)->count();

        // Get connected users with role_id = 3
        $connectedUsersWithRole3 = $term->connectedUsers()
        ->wherePivot('role_id', 3)
        ->get(['name']);

        return view('contents.front.view_term.index', compact('term', 'connectedUserCount', 'totalSessionCount', 'connectedUsersWithRole3', 'isEnrolled'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function plans()
    {

        $plans = $this->courseService->getPlanPageInfo();
        return view(
            'contents.front.plans.index',
            $plans
        );
    }
}
