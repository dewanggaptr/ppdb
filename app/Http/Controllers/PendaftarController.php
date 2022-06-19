<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Storage;
use PDF;
use Auth;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Calon Siswa';
        $id =  Auth::user()->id;
        $user = DB::table('user')->where('id', $id)->first();
        $pendaftar = DB::table('pendaftar')->where('user_id', $id)->first();

        return view('pendaftar.detail', compact('title', 'user', 'pendaftar'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            
            'nama' => 'required|string|max:200',
            'nisn' => 'required|string|max:45',
            'tempat_lahir' => 'required|string|max:45',
            'tanggal_lahir' => 'required',
            'email' => 'required|string|max:45',
            'alamat' => 'required',
            'telp' => 'required|string|max:45',
            'agama' => 'required|string|max:45',
            'asalSekolah' => 'required|string|max:100',
            'url_foto' => 'mimes:pdf,jpeg,png,jpg|max:2048',
            'nama_ayah' => 'required|string|max:200',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pendidikan_ayah' => 'required|string|max:100',
            'nama_ibu' => 'required|string|max:200',
            'pekerjaan_ibu' => 'required|string|max:100',
            'pendidikan_ibu' => 'required|string|max:100',

        ],

        $messages = 
        [   
            'nama.required' => 'Nama tidak boleh kosong!',
            'nisn.required' => 'Nama tidak boleh kosong!',
            'tempat_lahir.required' => 'Nama tidak boleh kosong!',
            'tanggal_lahir.required' => 'Nama tidak boleh kosong!',
            'alamat.required' => 'Nama tidak boleh kosong!',
            'url_foto.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, gif atau pdf.',
            'url_foto.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',


        ]);     

        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }

        $user_id = $user->id;
        $pendaftar = new Pendaftar;
        $pendaftar->user_id = $user_id;
        $pendaftar->nama = Input::get('nama');
        $pendaftar->nis = Input::get('nisn');
        $pendaftar->tempat_lahir = Input::get('tempat_lahir');
        $pendaftar->tanggal_lahir = Input::get('tanggal_lahir');
        $pendaftar->email = Input::get('email');
        $pendaftar->alamat = Input::get('alamat');
        $pendaftar->telp = Input::get('telp');
        $pendaftar->agama = Input::get('agama');
        $pendaftar->asalSekolah = Input::get('asalSekolah');
        $pendaftar->jurusan = Input::get('jurusan');
        if($file = $request->hasFile('url_foto')) {
            $namaFile = $user->id;
            $file = $request->file('url_foto') ;
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $pendaftar->url_foto = $fileName ;
        }
        $pendaftar->nama_ayah = Input::get('nama_ayah');
        $pendaftar->pekerjaan_ayah = Input::get('pekerjaan_ayah');
        $pendaftar->pendidikan_ayah = Input::get('pendidikan_ayah');
        $pendaftar->nama_ibu = Input::get('nama_ibu');
        $pendaftar->pekerjaan_ibu = Input::get('pekerjaan_ibu');
        $pendaftar->pendidikan_ibu = Input::get('pendidikan_ibu');
        
        $pendaftar->save();
     

        return redirect()->back()->with('success', 'Registrasi berhasil!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
