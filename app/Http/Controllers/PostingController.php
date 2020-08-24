<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Posting;
use App\User;


class PostingController extends Controller
{
    public function index()
    {
        $data_user = User::all();
    	$data_posting = Posting::all();

        return view ('pages.postings.posting', compact('data_posting','data_user'));
    }

    public function produklaris()
    {
        // $data_sku = Posting::orderBy('product_sku', 'desc')->take(3)->get();

        // $tmp = Posting::where('product_sku','456def')->count();

        return view ('pages.postings.sku', compact('tmp'));
    }

    public function create()
    {
        $data_status = Posting::all();
        return view ('pages.postings.addposting', compact('data_status'));
    }


    public function store(Request $request)
    {
        // UPLOAD PHOTO
       $file = $request->file('photo');
       $tujuan_upload = 'data_image';
       $nama_file = time()."_".$file->getClientOriginalName();
       $file->move($tujuan_upload,$nama_file);

       // FILTER STATUS
       $cari_status = $request->post_url;

        if( Posting::where('post_url', $cari_status)->first() != null ){ 
            $status = 'renew';
        } else{
            $status = 'new';
        }

        // INSERT DATA
       Posting::create([
            'product_sku' => $request->product_sku,
            'product_name' => $request->product_name,
            'channel_type' => $request->channel_type,
            'channel_name' => $request->channel_name,
            'channel_city' => $request->channel_city,
            'post_url' => $request->post_url,
            'post_title' => $request->post_title,
            'price' => $request->price,
            'status' => $status,
            'photo' => $nama_file,
            'user_id' => $request->user_id,
        ]);


       return redirect('home/posting')->with('success', 'selamat data berhasil ditambah!');
    }

    public function edit(Posting $Post)
    {
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
        Posting::find($id)->delete();
        return redirect(route('posting.index'))->with('Success', 'Data Deleted');
	}

    public function cari(Request $request)
    {
        $created_at = $request->created_at;
        $status = $request->status;
        $product_sku = $request->product_sku;
        $user_id = $request->user_id;

        $data_posting = DB::table('posting')
                        ->where('status','like',$status)
                        ->where('created_at','like',"%".$created_at."%")
                        ->where('product_sku','like',$product_sku)
                        ->where('user_id','like',$user_id)
                        ->paginate();

        $data_user = User::all();

        return view ('pages.postings.posting', compact('data_posting','data_user'));
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
