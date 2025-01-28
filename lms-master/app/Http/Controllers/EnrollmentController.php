<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Services\Back\Educations\CourseAdminService;
use App\Models\Course;
use App\Models\Term;
use App\Models\term_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    protected $service;
    public function __construct(CourseAdminService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $courses = Course::all();
        return view('contents.admin.enrollment.index', compact('courses'));
    }

    public function show($course_id)
    {
        $course = Course::find($course_id);
        $termsWithCourse = Term::whereHas('course', function ($query) use ($course_id) {
            $query->where('id', $course_id);
        })->get();
        return view('contents.admin.enrollment.show', compact('course', 'termsWithCourse'));
    }

    public function apply($term_id)
    {
        $term = Term::find($term_id);
        return view('contents.admin.enrollment.apply.index', compact('term'));
    }

    public function enroll($term_id)
    {
        $term = Term::find($term_id);
        $courses = Course::all();
        return view('contents.admin.enrollment.enroll.index', compact('courses', 'term'));
    }
    
    public function viewEnroll($term_id)
    {
        $term = Term::with('users')->find($term_id);
        //$terms = Term::find($term_id);
        $filteredUsers = $term->users->filter(function ($user) {
            return $user->pivot->role_id == 4;
        });

        return view('contents.admin.enrollment.viewEnroll.index', compact('filteredUsers','term'));
    }

    public function store(Request $request, $id)
    {
        // Get the current term
        $term = Term::find($id);
    
        if (!$term) {
            return redirect()->route('some.error.route'); // Handle error gracefully
        }
    
        // Get the logged-in user
        $user = auth()->user();
    
        // Check if the user is already enrolled in the term
        $existingEnrollment = DB::table('term_user')
            ->where('user_id', $user->id)
            ->where('term_id', $term->id)
            ->first();
    
        if (!$existingEnrollment) {
            // Enroll the user in the term and get the ID of the newly created record
            $enrollmentId = DB::table('term_user')->insertGetId([
                'user_id' => $user->id,
                'term_id' => $term->id,
                'role_id' => $user->role_id,
            ]);
    
            // Redirect the user to the term_user ID
            return redirect()->route('contents.learn.mycourses.show', ['id' => $enrollmentId]);
        }
    
        // Redirect the user to the course they are already enrolled in
        return redirect()->route('contents.learn.mycourses.show', ['id' => $existingEnrollment->id]);
    }
    

    

}
