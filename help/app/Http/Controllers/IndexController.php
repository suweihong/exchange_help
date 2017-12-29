<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;


class IndexController extends Controller
{
    //后台加载添加文章的页面
	public function add_a()
	{
		$categorys=Category::all();
		return view('/article/addarticle',compact('categorys'));
	}
	//文件上传
	 public function upload(Request $request)
    {
            //获取客户端传过来的文件
        $file = $request->file('file_upload');

        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();

            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;

            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';

            //将文件移动到本地服务器的指定的位置，并以新文件名命名
            $file->move($dirpath, $newfile);

            return $newfile;
        }
        
    }
	//后台处理添加文章的操作
	public function add_article(Request $request)
	{

		$article=new Article;
		$article->title=$request->input('title');
		$article->category_id=$request->input('bankuai');
		$article->content=$request->input('content');
		$article->recommend=$request->input('recommend');
		$article->img=$request->input('img');
		$res=$article->save();
		var_dump($res);
		

	}
	// 后台显示所有文章的列表
	public function show_articles(Request $request)
	{
		$tj=$request->all();
		if (empty($tj['search'])) {
			$articles = Article::paginate(10);
		}else{
			$articles=Article::where('title','like','%'.$tj['search'].'%')->paginate(10);
		}
		return view('/article/show',compact('articles'));
	}
	//后台加载修改文章的页面
	public function edit_a(Request $request)
	{
		$categorys=Category::all();
		$id=$request->route('id');
		$res=Article::find($id);
		return view('article/edit',compact('categorys','res'));
	}
	//后台处理修改文章的操作
	public function edit_article(Request $request)
	{
		$id=$request->input("id");
		$article=Article::find($id);
		$article->title=$request->input('title');
		$article->category_id=$request->input('bankuai');
		$article->content=$request->input('content');
		$article->img=$request->input('img');
		$article->recommend=$request->input('recommend');
		$res=$article->save();
		var_dump($res);
	}
	//后台删除文章
	public function del_article(Request $request)
	{
		$id = $request->input('id');
		$a = Article::destroy($id);
		return response()->json($a,200);

	}
	//加载前台帮助中心主页面
	public function home_help()
	{
		$categorys=Category::all();//所有分类
		$recommend=Article::where('recommend','=','1')->take(3)->get();//被推荐的文章
		$article1=Article::where('category_id','=','1')->orderBy('created_at','desc')->first();
		$article2=Article::where('category_id','=','2')->orderBy('created_at','desc')->first();
		$article3=Article::where('category_id','=','3')->orderBy('created_at','desc')->first();
		$at1=strtotime($article1['created_at']->toDateTimeString());
		$at2=strtotime($article2['created_at']->toDateTimeString());
		$at3=strtotime($article3['created_at']->toDateTimeString());
		$t=strtotime(Carbon::now()->toDateTimeString());
		$date1=floor(($t-$at1)/86400);
		$date2=floor(($t-$at2)/86400);
		$date3=floor(($t-$at3)/86400);
		return view('home/index',compact('categorys','recommend','article1','article2','article3','date1','date2','date3'));
	}
	//前台各类文章列表
	public function article_list(Request $request)
	{
		$id=$request->route('id');
		$category=Category::find($id);
		$articles=Category::find($id)->hasManyArticle;
		$recommend=Category::find($id)->hasManyArticle()->where('recommend','=',1)->orderBy('created_at','desc')->first();//每类文章的推荐文章
		$rid=$recommend->id;
		return view('home/help2',compact('category','articles','recommend','rid'));
		
	}
	//前台文章内容
	public function article_content(Request $request)
	{

		$id=$request->route('id');
		$article=Article::find($id);
		$article->save();
		$u=$request->input('u');
		if($u=='1')
		{
			$article=Article::where('id','=',$id)->first();
			$use=$article->useful+1;
			$article->useful=$use;
			$res=$article->save();
		}
		$uu=$article->useful;
		return  view('home/help1',compact('article','uu'));
	}
	//前台搜索文章
	public function homearticle_search(Request $request)
	{
		$tj=$request->all();
		$articles=Article::where('title','like','%'.$tj['search'].'%')->get();
		if($articles->isEmpty())
		{
			return  view('home/help4');
		}else{
			return  view('home/help3',compact('articles'));
		
		}
		
	}
}
