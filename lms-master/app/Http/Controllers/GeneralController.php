<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Term;
use App\Models\User;
use App\Services\Units\Coins\UserCoins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
   
    public function dashboard(UserCoins $userCoins)
{
    $user = Auth::user();
    $user->badge = $userCoins->getUserBadge($user);
    $profile_picture = $user->profile_picture;
    $departmentCount = Department::count();
    $courseCount = Course::count();
    $userCount = User::whereHas('roles', function ($query) {
        $query->where('role_id', 4);
    })->count();
    $supervisorCount = User::whereHas('roles', function ($query) {
        $query->where('role_id', 2);
    })->count();
    $mentorCount = User::whereHas('roles', function ($query) {
        $query->where('role_id', 3);
    })->count();
    $questionCount = Question::count();
    $quizCount = Quiz::count();
    $termCount = Term::count();
    $termCount_enroll = $user->terms()->count();
    $noFinishDateCount = $user->terms()
        ->wherePivot('finish_date', null)
        ->count();
        $finishDateCount = $user->terms()
        ->whereNotNull('term_user.finish_date')  // Specify the table alias for finish_date
        ->distinct('term_user.finish_date')      // Count distinct finish_date values
        ->count();    
        $topCourses = Term::select('terms.title as name', DB::raw('COUNT(term_user.term_id) as enrollments'))
        ->leftJoin('term_user', 'terms.id', '=', 'term_user.term_id')
        ->groupBy('terms.title')
        ->orderByDesc('enrollments')
        ->take(10)
        ->get();

   // Moved logic from Blade view to Controller
   $monthlyTermCounts = Term::selectRaw('MONTH(term_user.created_at) as month, COUNT(term_user.term_id) as count')
    ->leftJoin('term_user', 'terms.id', '=', 'term_user.term_id')
    ->where('term_user.role_id', 4)  // Add this line to filter by role_id
    ->groupBy('month')
    ->get();

   $labels = [];
   $data = [];

   foreach ($monthlyTermCounts as $count) {
       $month = \Carbon\Carbon::create()->month($count->month)->format('F');
       
       $labels[] = $month;
       $data[] = $count->count;
   }

// Pass data to the view
return view('contents.dashboard.index', compact('user', 'departmentCount', 'courseCount', 'userCount', 'termCount', 'termCount_enroll', 'noFinishDateCount', 'finishDateCount', 'supervisorCount', 'questionCount', 'mentorCount', 'topCourses', 'quizCount', 'labels', 'data'));
}

}
