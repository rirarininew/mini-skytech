<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Posting;
use App\User;
// use App\City;


class PostingController extends Controller
{
    public function index()
    {
    	$data_posting = Posting::all();
        // $data_city = City::all();
        return view ('pages.postings.posting', compact('data_posting'));
    }

    public function create()
    {
        // $data_city = City::all();
        return view ('pages.postings.addposting');
    }


    public function store(Request $request)
    {
       $file = $request->file('photo');
       $tujuan_upload = 'data_image';
       $nama_file = time()."_".$file->getClientOriginalName();
       $file->move($tujuan_upload,$nama_file);

       Posting::create([
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


       return redirect('home/posting')->with('success', 'selamat data berhasil ditambah!');
    }

    public function edit(Posting $Post)
    {
        // $data_city = City::all();
        return view ('pages.postings.editposting', compact('Post'));
    }

    public function update(Request $request, $Posting)
    {

        Posting::where('post_id', $Posting)->update([
            'product_sku' => $request->product_sku,
            'product_name' => $request->product_name,
            'channel_type' => $request->channel_type,
            'channel_name' => $request->channel_name,
            'channel_city' => $request->channel_city,
            'post_url' => $request->post_url,
            'post_title' => $request->post_title,
            'price' => $request->price,
            'status' => $request->status,
            // 'photo' => $request->photo,
            'user_id' => $request->user_id,
        ]);

        if($request->photo){
            $file = $request->file('photo');
            $tujuan_upload = 'data_image';
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);

            Posting::where('post_id', $Posting)->update([
                'photo' => $nama_file,
            ]);
            }

         return redirect('home/posting')->with('Success', 'data berhasil diupdate');
    }

    public function updateImage(Request $request, $Posting)
    {
        $file = $request->file('photo');
        $tujuan_upload = 'data_image';
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file);

        Posting::where('post_id', $Posting)->update([
            'photo' => $nama_file,
        ]);

         return redirect('home/posting')->with('Success', 'data berhasil diupdate');
    }

    public function delete($id)
    {
		DB::table('posting')->where('post_id',$id)->delete();
		return redirect('home/posting');
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

    public function carisku(Request $request)
    {
        $carisku = $request->carisku;
 
        $data_posting = DB::table('posting')
        ->where('product_sku','like',"%".$carisku."%")
        ->paginate();
 
        return view('pages.postings.sku',['data_posting' => $data_posting]);
    }

    public function carichannel(Request $request)
    {
        $carichannel = $request->carichannel;
 
        $data_posting = DB::table('posting')
        ->where('channel_type','like',"%".$carichannel."%")
        ->paginate();
 
        return view('pages.postings.channel',['data_posting' => $data_posting]);
    }

    public function cariuser(Request $request)
    {
        $cariuser = $request->cariuser;
 
        $data_posting = DB::table('posting')
        ->where('user_id','like',"%".$cariuser."%")
        ->paginate();

        $nama_user = User::all();
        $Uname;
        foreach($nama_user as $username){
            $Uname  = $username->name;
        }
 
        return view('pages.postings.user',['data_posting' => $data_posting]);
    }

    public function detail(Posting $Post)
    {
        $Uname;
        $nama_user = User::all();

        foreach($nama_user as $username){
            $Uname  = $username->name;
        }

        return view ('pages.postings.detail', compact('Post','Uname'));
    }

}
