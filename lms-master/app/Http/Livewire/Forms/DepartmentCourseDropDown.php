<?php

namespace App\Http\Livewire\Forms;

use App\Models\Course;
use App\Models\Department;
use Livewire\Component;

class DepartmentCourseDropDown extends Component
{
    public $courses = [];
    public $departments = [];
    public $department_id = null; // Remove ?int, use null as default
    public $course_id = null; // Remove ?int, use null as default

    public function mount(): void
{
    $this->departments = Department::all();
    $this->courses = Course::where('department_id', $this->department_id)->get();
    $this->course_id = ''; // Initialize $course_id as an empty string
}

    public function selectDepartment(): void
    {
        if ($this->department_id === null) {
            // Reset course_id when no department is selected
            $this->course_id = null;
        } else {
            // Update the courses based on the selected department
            $this->courses = Course::where('department_id', $this->department_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.forms.department-course-drop-down');
    }
}

