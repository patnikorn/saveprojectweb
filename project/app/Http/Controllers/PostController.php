<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->paginate(5);
        return view('index' , ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function search(Request $request)
    {
      $names='';
      $details='';
      $authors='';
      $a = $_GET['search'];
      $posts = DB::select("select * from posts where name LIKE '%{$a}%'");
      // $b = DB::table('posts')->paginate(5);
      // print_r($b);
          // $search = $request->get('search');
    //  $posts = DB::table('posts')->where('name','like','%' .$a. '%')->paginate(5);
      //echo '<br>'.$posts;
          return view('search',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $detail = $request->get('detail');
        $author = $request->get('author');
        $posts = DB::insert('insert into posts(name, detail, author) value(?,?,?)',[$name, $detail, $author]);
        if($posts){
            $red = redirect('posts')->with('success','Data has been added');
        } else {
            $red = redirect('posts/create')->with('danger','Input data failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::select('select * from posts where id=?',[$id]);
        return view('show',['posts'=> $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
