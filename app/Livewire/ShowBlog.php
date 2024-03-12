<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowBlog extends Component
{

    #[Url]
    public $categorySlug = null;
    public function render()
    {

        //* Verifica se o slug da categoria não está vazio
        if (!empty($this->categorySlug)) {

            //& Se não estiver vazio, encontra a categoria correspondente ao slug

            $category = Category::where('slug', $this->categorySlug)->first();
            //& Em seguida, obtém os artigos ordenados por data de criação (do mais recente para o mais antigo)
            //& filtrando apenas os artigos que pertencem à categoria encontrada

            if(!$category){
                abort(404);
            }

            $articles = Article::orderBy('created_at', 'desc')->where('category_id', $category->id)->paginate(5);

        } else {

            //& Se o slug da categoria estiver vazio, simplesmente obtém todos os artigos, 
            //& ordenados por data de criação (do mais recente para o mais antigo)
            $articles = Article::orderBy('created_at', 'desc')->where('status',1)->paginate(5);
        }

        $latestArticles = Article::orderBy('created_at', 'desc')->take(3)->where('status',1)->get();

        $categories = Category::all();

        return view('livewire.show-blog', [
            'articles' => $articles,
            'categories' => $categories,
            'latestArticles' => $latestArticles
        ]);
    }
}
