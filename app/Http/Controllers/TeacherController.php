<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function index() {
        $teachers = Teacher::orderBy('last_name')->orderBy('first_name')->get();

        return inertia('Teachers/Index',[
            'teachers' => $teachers
        ]);
    }

    public function show(Teacher $teacher) {
        return inertia('Teachers/Show', compact('teacher'));
    }

    public function edit(Teacher $teacher) {
        return inertia('Teachers/Edit', compact('teacher'));
    }

    public function update(Teacher $teacher, Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
            'grade' => 'string|required',
            'rank' => 'string|required',
        ]);

        $teacher->update($request->all());

        $request->session()->flash('flash.banner', 'Teacher Info Updated Successfully!');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/teachers/' . $teacher->id);
    }

    public function destroy(Teacher $teacher) {
        $teacher->delete();
        return redirect()->route('teachers')->dangerBanner('Teacher Removed Successfully!');
    }

    public function create() {
        return inertia('Teachers/Create');
    }

    public function store(Request $request) {

        $fields = $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
            'grade' => 'string|required',
            'rank' => 'string|required',
            'email' => 'string',
        ]);

        $fileName = null;

        if ($request->pic) {
            $fileName = time() . '.' . $request->pic->extension();
            $request->pic->move(public_path('uploads/pic'), $fileName);
            $fields['pic'] = $fileName;
        }

        $t = Teacher::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'bdate' => $request->bdate,
            'grade' => $request->grade,
            'rank' => $request->rank,
            'pic' => $fileName,
        ]);

        return redirect()->route('teachers')->banner('Teacher Added Successfully!');
    }

    public function search($searchKey) {
        return inertia('Teachers/Index', [
            'teachers' => Teacher::where('last_name', 'like', "%$searchKey%")->orWhere('first_name', 'like', "%$searchKey%")->get()
        ]);
    }

    public function toggle(Teacher $teacher) {
        $teacher->done = !$teacher->done;
        $teacher->save();

        return back();
    }

    public function pdf(Teacher $teacher) {
        $pdf = Pdf::loadView('pdf.teacher', [
            'teacher' => $teacher
        ]);

        return $pdf->stream();
    }

    public function email(Teacher $teacher) {
        $pdf = Pdf::loadView('pdf.teacher', [
            'teacher' => $teacher
        ]);

        $filename = 'statements/' . $teacher->last_name . "_" . $teacher->id . ".pdf";
        $pdf->save($filename);

        Mail::send('email.sor', ['teacher'=>$teacher], function($message) use ($teacher, $filename) {
            $message->to($teacher->email);
            $message->subject('Statement of Reports');
            $message->attach($filename);
        });
        return back();
    }
}
