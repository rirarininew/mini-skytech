<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Posting;
use App\City;


class PostingController extends Controller
{
    public function index()
    {
    	$data_posting = Posting::all();
        $data_city = City::all();
        return view ('pages.postings.posting', compact('data_posting','data_city'));
    }

    public function create()
    {
        $data_city = City::all();
        return view ('pages.postings.addposting', compact('data_city'));
    }


    public function store(Request $request)
    {
       $file = $request->file('photo');
       $tujuan_upload = 'data_image';
       $nama_file = time()."_".$file->getClientOriginalName();
       $file->move($tujuan_upload,$nama_file);

       Posting::create([
            'file' => $nama_file,
            'product_sku' => $request->product_sku,
            'product_name' => $request->product_name,
            'channel_type' => $request->channel_type,
            'channel_name' => $request->channel_name,
            'channel_city' => $request->channel_city,
            'post_url' => $request->post_url,
            'post_title' => $request->post_title,
            'price' => $request->price,
            'status' => $request->status,
            'photo' => $nama_file,
            'user_id' => $request->user_id,
        ]);


       return redirect('posting')->with('success', 'selamat data berhasil ditambah!');
    }

    public function edit(Posting $Post)
    {
        $data_city = City::all();
        return view ('pages.postings.editposting', compact('Post','data_city'));
    }

    public function update(Request $request, $Posting)
    {
         $validasi = $request->validate([    
        'product_sku' => 'required',
        'product_name' => 'required',
        'channel_type' => 'required',
        // 'channel_name' => 'required',
        'channel_city' => 'required',
        'post_url' => 'required',
        'post_title' => 'required',
        'price' => 'required',
        'status' => 'required',
        'photo' => 'required',
        // 'user_id' => 'required',
       ]);

         Posting::where('post_id', $Posting)->update($validasi);
         return redirect('posting')->with('Success', 'data berhasil diupdate');
    }

    public function delete($id)
    {
		DB::table('posting')->where('post_id',$id)->delete();
		return redirect('posting');
	}

    public function cari(Request $request)
    {
        $cari = $request->cari;
 
        $data_posting = DB::table('posting')
        ->where('status','like',$cari)
        ->paginate();
 
        return view('pages.postings.posting',['data_posting' => $data_posting]);
    }

    public function caritgl(Request $request)
    {
        $caritgl = $request->caritgl;
 
        $data_posting = DB::table('posting')
        ->where('created_at','like',"%".$caritgl."%")
        ->paginate();
 
        return view('pages.postings.posting',['data_posting' => $data_posting]);
    }

    public function detail(Posting $Post)
    {
        return view ('pages.postings.detail', compact('Post'));
    }

}
