<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(){
        $bukus=Buku::all();
        return view('buku.index',compact('bukus'));
    }
    public function create(){
        return view('buku.create');
    }
    public function store(Request $request){
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'kategori'=>'required',
            'jml'=>'required',
            'img'=>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $pathGambar=null;
        if($request->hasFile('img')){
            $ext=$request->file('img')->getClientOriginalExtension();
            $namingFile=now()->format('YmdHis').'.'.$ext;
            $pathGambar=$request->file('img')->storeAs('gambarBuku',$namingFile,'public');
        }
        $bukus=Buku::create([
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'kategori'=>$request->kategori,
            'jml'=>$request->jml,
            'img'=>$pathGambar,
        ]);
        return redirect()->route('index.buku');
    }
    public function show(String $id){
        $bukus=Buku::findOrFail($id);
        return view('buku.store',compact('bukus'));
    }
    public function update(Request $request, String $id){
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'kategori'=>'required',
            'jml'=>'required',
            'img'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $bukus=Buku::findOrFail($id);
        $pathGambar=$bukus->img;
        if ($request->hasFile('img')) {
            $ext=$request->file('img')->getClientOriginalExtension();
            $namingFile=now()->format('YmdHis').'.'.$ext;
            $pathGambar=$request->file('img')->storeAs('gambarBuku',$namingFile,'public');
        }
        $bukus->update([
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'kategori'=>$request->kategori,
            'jml'=>$request->jml,
            'img'=>$pathGambar,
        ]);
        return redirect()->route('index.buku');
    }
    public function edit(String $id){
        $bukus=Buku::findOrFail($id);
        return view('buku.edit',compact('bukus'));
    }
    public function destroy(String $id) {
        $bukus=Buku::findOrFail($id);
        $bukus->delete();
        return redirect()->route('index.buku');
    }
}
