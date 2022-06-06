<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Carbon\Carbon;

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
        $student['date_of_birth'] = Carbon::parse($student['date_of_birth'])->isoFormat('d MMMM Y');
        $score = Score::where('user_id', $student->user_id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Student retrieved successfully.',
            'data'    => [
                'student' => $student,
                'score' => $score]
        ]);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $student = Student::find($id);
        $student->name = $input['name'];
        $student->place_of_birth = $input['place_of_birth'];
        $student->date_of_birth = Carbon::parse($input['date_of_birth'])->isoFormat('d MMMM Y');
        $student->parents_name = $input['parents_name'];
        $student->nis = $input['nis'];
        $student->nisn = $input['nisn'];
        $student->isUpdate = true;
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
    public function updateScore(Request $request, $id)
    {
        $student = Student::find($id);
        Score::where('user_id',$student->user_id)->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Student score updated successfully.',
        ]);
    }
    public function verified($id)
    {
        $student = Student::find($id);
        $student->isVerified = true;
        $student->save();
        return response()->json([
            'success' => true,
            'message' => 'Student verified successfully.',
            'data'    => $student
        ]);
    }
}
