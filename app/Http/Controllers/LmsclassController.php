<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Lmsclass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LmsclassController extends Controller
{
    public function index(Request $request)
    {
        $lmsclasses = Lmsclass::latest()->paginate(5);

        $type = $request->query('type');

        if ($type == 'schedule') {
            $lmsclasses = Lmsclass::where('classtype', 'schedule')->latest()->paginate(5);
        } elseif ($type == 'tute') {
            $lmsclasses = Lmsclass::where('classtype', 'tute')->latest()->paginate(5);
        } elseif ($type == 'video') {
            $lmsclasses = Lmsclass::where('classtype', 'video')->latest()->paginate(5);
        }

        return view('admin.lmsclass.index', compact('lmsclasses', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $batch_data = Batch::all();
        $teacher_data = Teacher::all();
        $course_data = Course::all();
        return view('admin.lmsclass.create', compact('batch_data', 'teacher_data', 'course_data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'classtype' => 'required',
            'paytype' => 'required',
            'teacher_id' => 'required',
            'batch_id' => 'required',
            'course_id' => 'required',
            'image' => 'image|max:2048',
            'doc' => 'file|mimes:doc,pdf,docx'
        ]);

        $lmsclass = Lmsclass::create($request->all());

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/img'), $filename);
            $lmsclass->image = $filename;
            $lmsclass->save();
        }

        if ($request->file('doc')) {
            $file = $request->file('doc');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/doc'), $filename);
            $lmsclass->doc = $filename;
            $lmsclass->save();
        }

        return redirect()->route('lmsclass.index')->with('success', 'Class created successfully.');
    }

    public function show(Lmsclass $lmsclass)
    {
        return view('admin.lmsclass.show', compact('lmsclass'));
    }

    public function edit(Lmsclass $lmsclass)
    {
        $batch_data = Batch::all();
        $teacher_data = Teacher::all();
        $course_data = Course::all();
        return view('admin.lmsclass.edit', compact('lmsclass', 'batch_data', 'teacher_data', 'course_data'));
    }

    public function update(Request $request, Lmsclass $lmsclass)
    {
        $request->validate([
            'title' => 'required',
            'classtype' => 'required',
            'paytype' => 'required',
            'teacher_id' => 'required',
            'batch_id' => 'required',
            'course_id' => 'required',
        ]);

        $lmsclass->update([
            'title' => $request->title,
            'classtype' => $request->classtype,
            'paytype' => $request->paytype,
            'teacher_id' => $request->teacher_id,
            'batch_id' => $request->batch_id,
            'course_id' => $request->course_id,
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/kycs/img'), $filename);
            $lmsclass->image = $filename;
            $lmsclass->save();
        }

        if ($request->file('doc')) {
            $file = $request->file('doc');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/docs'), $filename);
            $lmsclass->doc = $filename;
            $lmsclass->save();
        }

        return redirect()->route('lmsclass.index')->with('success', 'Class updated successfully');
    }


    public function destroy(Lmsclass $lmsclass)
    {
        $lmsclass->delete();

        return redirect()->route('lmsclass.index')->with('success', 'Class deleted successfully');
    }
}
