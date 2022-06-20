<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;



class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        //pendaftaran
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
        $user = new User;
        $user_id = $user->id;
        $pendaftar = new Pendaftar;
        $pendaftar->user_id = $user_id;
        $pendaftar->nama = $request->get('nama');
        $pendaftar->nisn = $request->get('nisn');
        $pendaftar->tempat_lahir = $request->get('tempat_lahir');
        $pendaftar->tanggal_lahir = $request->get('tanggal_lahir');
        $pendaftar->email = $request->get('email');
        $pendaftar->alamat = $request->get('alamat');
        $pendaftar->telp = $request->get('telp');
        $pendaftar->agama = $request->get('agama');
        $pendaftar->asalSekolah = $request->get('asalSekolah');
        $pendaftar->jurusan = $request->get('jurusan');
        if($file = $request->hasFile('url_foto')) {
            $namaFile = $user->id;
            $file = $request->file('url_foto') ;
            $fileName = $namaFile.'_'.$file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $pendaftar->url_foto = $fileName ;
        }
        $pendaftar->nama_ayah = $request->get('nama_ayah');
        $pendaftar->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $pendaftar->pendidikan_ayah = $request->get('pendidikan_ayah');
        $pendaftar->nama_ibu = $request->get('nama_ibu');
        $pendaftar->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $pendaftar->pendidikan_ibu = $request->get('pendidikan_ibu');
        
        $pendaftar->save();
     

        return redirect()->route('pendaftar.detail')
            ->with('success', 'Registrasi berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id =  Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id',$id)->first();
        return view('pendaftar.detail', ['Pendaftar' => $pendaftar]);
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

    public function cetak_formulir(){
        $id =  Auth::user()->id;
        $pendaftar = Pendaftar::where('user_id',$id)->first();

        $pdf = PDF::loadview('pendaftar.cetak_form', ['Pendaftar' => $pendaftar]);
        return $pdf->stream();
    
    }
}
