<?php

declare(strict_types=1);

namespace App\Http\Controllers;



//use App\Models\Category;
use App\Models\EloquentModels\Category;
use App\Models\EloquentModels\News;
//use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->paginate(10);;

//        $categories = DB::table('categories')->get();

        return view('blade.categories.index')->with(['categories' => $categories]);
    }

    public function show(string $slug ): View
    {
        //dd($slug);
        $categoryId = Category::query()
            ->select('categories.*')
            ->where('categories.slug', '=', $slug)
            ->value('id');


        $news = News::query()
            ->with('category')
            /*->join('categories', 'categories.id','=', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')*/
            ->where('news.category_id', '=', $categoryId)
            ->get();

        $categoryName = Category::query()
            ->select('categories.*')
            ->where('categories.id', '=', $categoryId)
            ->value('name');

//        dd($categoryName);
        return \view('blade.categories.show')->with(['news' => $news, 'name' => $categoryName]);

    }


    // ---------------- Before DB -------------------------
//    use NewsTrait;

    /*public function index(Category $category): View
    {
        return  \view('blade.categories.index')
                    -> with('categories', $category->getCategories());*/

        /*return \view('categories.index', [
            'categories' => $this->getCategory(),
        ]);*/

        //return $this->getCategory();
//    }

    /*public function show($slug, Category $category, News $news): View
    {
        return  \view('blade.categories.show')
            ->with('categories', $category->getCategoryNewsBySlug($slug, $news));*/


        /*return \view('categories.show', [
            'categories' => $this->getNewsByCategory($id),
        ]);
//        return $this->getNewsByCategory($id);*/
    //}

// Unused functions -----------------------------------------------------------

    /*public function showBySlug(News $news, Category $category, $slug): View
    {
        return view('blade.categories.show')
            ->with('category', $category->getNewsByCategorySlug($slug, $news))
            ->with('category', $category->getCategoryNameBySlug($slug));
    }*/

}
