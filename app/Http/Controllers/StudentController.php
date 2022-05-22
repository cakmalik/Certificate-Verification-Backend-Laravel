<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'success' => true,
            'message' => 'Students retrieved successfully.',
            'data'    => $students
        ]);
    }
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
            'data'    => $student
        ]);
    }
    public function show($id)
    {
        $student = Student::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Student retrieved successfully.',
            'data'    => $student
        ]);
    }
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $student->name = $input['name'];
        $student->place_of_birth = $input['place_of_birth'];
        $student->date_of_birth = $input['date_of_birth'];
        $student->parents_name = $input['parents_name'];
        $student->nis = $input['nis'];
        $student->isUpdate = true;
        $student->isVerified = $input['isVerified'];
        $student->save();

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully.',
            'data'    => $student
        ]);
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully.',
            'data'    => $student
        ]);
    }
}
