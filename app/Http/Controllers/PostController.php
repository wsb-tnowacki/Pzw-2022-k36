<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Models\Posty;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$posty = Posty::all();
        //$posty = Posty::paginate(5);
        $posty = Posty::with('user')->paginate(5);
        return view('posty.index', compact('posty'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posty.dodaj');
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
   /*  public function store(Request $request)
    {
        //dd($request);
        // dump($request);
        // $request->dump();
        // echo $request->tytul;
        // sleep(2);
        $request->validate([
            'tytul' => 'required',
            'autor' => 'required',
            'email' => 'required|email:rfc,dns|min:3',
            'tresc' => 'required|min:5'
        ]);

        return redirect()->route('posty.index')->with('message', 'Post został dodany');
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $posty = new Posty();
        $posty->tytul = request('tytul');
        $posty->autor = request('autor');
        $posty->email = request('email');
        $posty->tresc = request('tresc');
        $posty->user_id = Auth::user()->id;
        $posty->save();
        return redirect()->route('posty.index')->with('message', 'Post został dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$post = Posty::findOrFail($id);
        $post = Posty::with('user')->with('update_user')->findOrFail($id);
        return view('posty.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posty::findOrFail($id);
        return view('posty.zmien', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $post = Posty::findOrFail($id);
        /* $post->tytul = request('tytul');
        $post->autor = request('autor');
        $post->email = request('email');
        $post->tresc = request('tresc');
        $post->update(); */
        $post->update_user_id = Auth::user()->id;
        $post->update(request()->all());
        return redirect()->route('posty.index')->with('message', 'Post został uaktualniony');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posty::findOrFail($id);
        $post->delete();
        return redirect()->route('posty.index')->with('message', 'Post został usunięty')->with('type', 'danger');
    }
}
