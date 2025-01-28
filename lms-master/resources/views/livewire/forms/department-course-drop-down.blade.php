<div class="mb-1">
    <div class="form-group">
            <label>Department: </label>
            <select name="department_id" wire:change="selectDepartment" wire:model="department_id"
                class="form-control form-select form-select-lg mb-3">
                <option>{{ __('Please Select Department') }}</option>
                @forelse ($departments as $department)
                    <option {{ $department_id == $department->id ? 'selected' : '' }} value="{{ $department->id }}">
                        {{ $department->title }}</option>
                @empty
                @endforelse
            </select>
    </div>
    <div class="form-group">
            <label>Course: </label>
            <select name="course_id" id="" class="form-control form-select form-select-lg mb-3">
                @if ($courses->isEmpty())
                    <option value="">{{ __('Please Select Course') }}</option>
                @else
                    @foreach ($courses as $course)
                        <option {{ $course_id == $course->id ? 'selected' : '' }} value="{{ $course->id }}">
                            {{ $course->title }}</option>
                    @endforeach
                @endif
            </select>
    </div>
</div>
