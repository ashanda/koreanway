<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
  public function index()
  {
    $classes = Classes::latest()->paginate(5);
    return view('admin.class.index', compact('classes'))->with('i', (request()->input('page', 1) - 1) * 5);
  }

  public function create()
  {
    $batch_data = Batch::all();
    $teacher_data = Teacher::all();
    $course_data = Course::all();
    return view('admin.class.create', compact('batch_data', 'teacher_data', 'course_data'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'classtype' => 'required',
      'teacher_id' => 'required',
      'batch_id' => 'required',
      'course_id' => 'required',
      'image' => 'image|max:2048',
    ]);

    if ($request->file('selfie_photo')) {
      $file = $request->file('selfie_photo');
      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('/kycs/img'), $filename);
      $kyc->selfie_image = $filename;
    }

    return redirect()->route('class.index')->with('success', 'Class created successfully.');
  }

  public function show(Classes $classes)
  {
    return view('admin.class.show', compact('classes'));
  }

  public function edit(Classes $classes)
  {
    $batch_data = Batch::all();
    $teacher_data = Teacher::all();
    $course_data = Course::all();
    return view('admin.class.edit', compact('classes', 'batch_data', 'teacher_data', 'course_data'));
  }

  public function update(Request $request, Classes $classes)
  {
    $request->validate([
      'title' => 'required',
      'classtype' => 'required',
      'teacher_id' => 'required',
      'batch_id' => 'required',
      'course_id' => 'required',
    ]);

    // Retrieve the batch data
    $classes->update($request->all());

    return redirect()->route('class.index')->with('success', 'Class updated successfully');
  }
  public function destroy(Classes $classes)
  {
    $classes->delete();

    return redirect()->route('class.index')->with('success', 'Class deleted successfully');
  }
}
