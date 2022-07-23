<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentsResource;

class StudentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'last_name' => 'required|string|max:255',
      'first_name' => 'required|string|max:255',
      'contact' => 'nullable|string|max:255',
      'age' => 'nullable|integer',
      'level_id' => 'required|integer',
      'motivation' => 'nullable|string|max:255',
    ]);

    $student = Student::create($request->all());
    return response()->json([
      'data' => new StudentsResource($student),
      'message' => 'Student created successfully',
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function show(Student $student)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Student $student)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function destroy(Student $student)
  {
    //
  }
}
