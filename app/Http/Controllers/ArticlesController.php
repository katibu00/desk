<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.articles.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'content' => 'required',
            'featured' => 'boolean',
            'published' => 'boolean',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, create the article
        $article = new Article();
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->subject_id = $request->input('subject_id');
        $article->content = $request->input('content');
        $article->featured = $request->has('featured');
        $article->published = $request->has('published');
        $article->save();

        return redirect()->route('articles')->with('success', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        $subjects = Subject::all();
        return view('admin.articles.edit', compact('article', 'subjects'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject_id' => 'nullable|exists:subjects,id',
            'featured' => 'nullable|boolean',
            'published' => 'nullable|boolean',
        ]);

        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->slug = Str::slug($request->input('title'));
        $article->subject_id = $request->input('subject_id');
        $article->featured = $request->has('featured');
        $article->published = $request->has('published');
        $article->save();

        return redirect()->route('articles')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles')->with('success', 'Article deleted successfully.');
    }


    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('user.pages.single_article', compact('article'));
    }



    public function searchTopics(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('query');
    
        if (empty($searchQuery)) {
            // If the search query is empty, return an empty response
            return response()->json([]);
        }

        // Perform the search query on the Article model
        $searchResults = Article::where('title', 'like', '%'.$searchQuery.'%')
                                ->orWhere('content', 'like', '%'.$searchQuery.'%')
                                ->get();
    
        // Return the search results as JSON
        return response()->json($searchResults);
    }

}
