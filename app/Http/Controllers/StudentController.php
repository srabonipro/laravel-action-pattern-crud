<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Actions\Student\CreateStudent;
use App\Actions\Student\DeleteStudent;
use App\Actions\Student\UpdateStudent;
use App\Http\Requests\StudentFormRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }


    public function create()
    {
        return view('student.create');
    }


    public function store(StudentFormRequest $request)
    {
        $created = CreateStudent::create($request);

        if($created){
            session()->flash('message', 'Student Added Successfuly...');
        }else{
            session()->flash('message', 'Something went wrong...');
        }
        return back();
    }


    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }


    public function update(StudentFormRequest $request, Student $student)
    {
        $updated = UpdateStudent::update($request, $student);

        if($updated){
            session()->flash('message', 'Student Updated Successfuly...');
        }else{
            session()->flash('message', 'Something went wrong...');
        }
        return back();
    }


    public function destroy(Student $student)
    {
        $deleted = DeleteStudent::delete($student);

        if($deleted){
            session()->flash('message', 'Student Deleted Successfully...');
        }else{
            session()->flash('message', 'Something went wrong...');
        }
        return back();
    }
}
