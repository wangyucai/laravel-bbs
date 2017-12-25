<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category, Topic $topic)
    {
        // 读取分类ID关联的话题，并按每20页分页
        $topics = $topic->withOrder($request->order)
                        ->where('category_id', $category->id)
                        ->paginate(20);
        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category'));
    }
}
