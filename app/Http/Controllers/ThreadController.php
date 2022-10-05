<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use PHPUnit\Exception;
use function GuzzleHttp\Promise\all;

class ThreadController extends Controller
{
    private $thread;

    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    public function index()
    {
        $threads = $this->thread->paginate(15);
        return view('thread.index',compact('threads'));
    }

    public function create()
    {
        return view('thread.create');
    }

    public function store(Request $request)
    {
        try{
            $this->thread->create($request->all());
            dd('Tópico criado com sucesso');
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function show($id)
    {
        return redirect()->route('threads.edit',$id);
    }

    public function edit($id)
    {
        $threads = $this->thread->find(1);
        return view('thread.edit',compact('threads'));
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
        try{
            $thread = $this->thread->find($id);
            $thread->update($request->all());
            dd('Tópico atualizado com sucesso');
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $thread = $this->thread->find($id);
            $thread->delete();
            dd('Tópico excluido com sucesso');
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
