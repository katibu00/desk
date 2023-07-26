<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $roles = UserRole::all();
        return view('admin.subjects.index', compact('subjects', 'roles'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'userRoles' => 'required|string',
            'subjects' => 'required|string',
        ]);

        // Extract the data from the validated request
        $userRoles = explode(',', $validatedData['userRoles']);
        $subjects = explode(',', $validatedData['subjects']);

        // Process the data and save subjects to the database
        // (This is just an example, modify the logic based on your requirements)
        foreach ($subjects as $subject) {
            $newSubject = new Subject();
            $newSubject->name = $subject;
            $newSubject->slug = Str::slug($subject);
            $newSubject->user_role_id = implode(',', $userRoles);
            $newSubject->save();
        }

        // Return a success response
        return response()->json(['message' => 'Subjects added successfully']);
    }


    
    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subjectId' => 'required|integer', // Assuming subjectId is an integer
            'subjectName' => 'required|string|max:255',
            'userRoles' => 'required|array',
            'userRoles.*' => 'integer', // Assuming user role IDs are integers
        ]);
    
        $subjectId = $request->subjectId;
    
        // Find the subject by ID
        $subject = Subject::findOrFail($subjectId);
        $subject->name = $request->subjectName;
        $subject->slug = Str::slug($request->input('subjectName'));

        $subject->user_role_id = implode(',', $request->userRoles);
        
        // Save the updated subject
        $subject->save();
    
        // Return a response indicating success
        return response()->json(['message' => 'Subject updated successfully']);
    }
    

    public function showSubjectArticles($slug)
{
    // Get the subject based on the slug
    $subject = Subject::where('slug', $slug)->firstOrFail();

    // Get all articles related to the subject
    $articles = $subject->articles;

    return view('user.pages.all_topics', compact('subject', 'articles'));
}

}
