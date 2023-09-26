<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
// use Illuminate\Http\UploadedFile;
// use App\Http\Controllers\Session;
// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{

    //=============== All Students Fetch
    function students()
    {
        $std['students'] = Student::all();
        return view('students', $std);
    }

    // Add Student
    function addStudent()
    {

        return view('add_student_modal');
    }


    //================= Add New Student
    function storeStudent(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'roll' => ['required', 'unique:students,roll', 'integer'],
            // Assuming 'roll' is an integer field
            'reg' => ['required', 'unique:students,reg', 'integer'],
            // Assuming 'reg' is a string field
            'img' => 'required|mimes:png,jpg,jpeg',
            'email' => 'required|email|unique:students,email',
        ]);


        $insert = new Student();
        $insert->name = $request->name;
        $insert->roll = $request->roll;
        $insert->reg = $request->reg;
        $insert->email = $request->email;

        $imageName = '';
        if ($image = $request->file('img')) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/students', $imageName);
        }
        $insert->image = $imageName;
        // $insert->image = $request->img;
        $insert->save();


        session()->flash('msg', 'Student Added Success');
        session()->flash('msg_type', 'success');
        return redirect()->route('all.student');

    }

    //=============== Update Student
    function editStudent($id)
    {
        $up_std['student'] = Student::findOrFail($id);
        return view('edit_student', $up_std);
    }


    function updateStudent(Request $request, $id)
    {

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->reg = $request->reg;

        // Store the old image filename
        $imageName = '';

        if ($image = $request->file('img')) {
            // Get the current image filename from the database
            $currentImage = $student->image;

            // Delete the previous image if it exists
            if (!empty($currentImage)) {
                // Specify the path to the directory where images are stored
                $imagePath = public_path('images/students/' . $currentImage);

                // Check if the file exists before attempting to delete it
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the previous image
                }
            }

            // Generate a new image filename
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Move and save the new image
            $image->move('images/students', $imageName);
            $student->image = $imageName;

        }

        $student->update();

        session()->flash('msg', 'Student Updated Success');
        session()->flash('msg_type', 'success');
        return redirect()->route('all.student');
    }

    function deleteStudent($id)
    {

        $deleteStudent = Student::findOrFail($id);

        $oldImgPath = 'images/students/' . $deleteStudent->image;
        // Check if the file exists before attempting to delete it
        if (file_exists($oldImgPath)) {
            unlink($oldImgPath); // Delete the previous image
        }

        $deleteStudent->delete();
        session()->flash('msg', 'Student Deleted Successfully');
        session()->flash('msg_type', 'success');
        return redirect()->route('all.student');
    }

    function statusStudent($id)
    {
        $changeStatus = Student::findOrFail($id);

        if ($changeStatus->status == 1) {
            $status = 0;
            $msg = 'Student Deactivated...';
        } else {
            $status = 1;
            $msg = 'Student Activated...';
        }

        $changeStatus->update(['status' => $status]);

        session()->flash('msg', $msg);
        session()->flash('msg_type', 'success');
        return redirect()->route('all.student');
    }

}