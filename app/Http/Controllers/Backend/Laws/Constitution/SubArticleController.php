<?php

namespace App\Http\Controllers\Backend\Laws\Constitution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubArticle;

class SubArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sub_articles'] = SubArticle::paginate(10);

        return view('backend.laws.constitution.sub_articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.laws.constitution.sub_articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd();
        $validated_data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        if ($validated_data)
        {
            $sub_article = [
            'title' => $request->title,
            'article_id' => $request->article_id,
            'description' => $request->description,
            'created_by' => auth()->user()->first_name . ' ' . auth()->user()->last_name
            ];
            
            //dd($sub_article);
            SubArticle::create($sub_article);

            return redirect()->back()->with('success','Sub Article successfully added to the constitution');
        }
        else
        {
            return redirect()->back()->with('warning','Sub Article was not added to the constitution');
        }
        
    }

    /**
     * Display Sub Article.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data['sub_article'] = SubArticle::find($id);

        return view('backend.laws.constitution.sub_articles.show', $data);
    }

    /**
     * Show the form for editing Sub Article.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data['sub_article'] = SubArticle::find($id);

        return view('backend.laws.constitution.sub_articles.edit', $data);
    }

    /**
     * Update Sub Article in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        //dd($validated_data);
        $sub_article = SubArticle::find($id);

        $sub_article->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->back()->with('info','Sub Article details successfully Updated');
    }

    /**
     * Remove Sub Article from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        SubArticle::destroy($id);

        return redirect()->back()->with('danger','Sub Article removed from this Article');
    }
}
