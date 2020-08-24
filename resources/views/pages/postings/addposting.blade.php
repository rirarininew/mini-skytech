@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Manage Posting',
    'activePage' => 'posting',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('posting.store') }}" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card">
          <button type="Submit" class="btn btn-primary btn-round float-right" style="margin-right:2rem;margin-top:1rem">{{__('Save Posting')}}</button> 
          <div class="card-header">
            <h5 class="title">{{__(" Add Posting")}}</h5>
          </div>
          <div class="card-body">
            @if (session('status'))
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  </ul>
                </div>
                @endif

              <input class="form-control" name="user_id" type="text" value="{{ Auth::user()->id }}" hidden/>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Product SKU")}}</label>
                    <input class="form-control" name="product_sku" type="text">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Channel Type")}}</label>
                      <select class="form-control" name="channel_type">
                        <option value="lazada">Lazada</option>
                        <option value="tokopedia">Tokopedia</option>
                        <option value="shopee">Shopee</option>
                        <option value="olx">OLX</option>
                        <option value="bukalapak">Bukalapak</option>
                        <option value="facebook marketplace">Facebook Marketplace</option>
                        <option value="forum">Forum</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Product Name")}}</label>
                    <input class="form-control" name="product_name" type="text">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Channel Name")}}</label>
                    <input class="form-control" name="channel_name" type="text">
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Product Image")}}</label><br>
                    <div class="form-group">
                      <input type="file" class="form-control" name="photo">
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Channel City")}}</label>
                    <input class="form-control" name="channel_city" type="text">
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Product Price")}}</label>
                    <input class="form-control" name="price" type="text">
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Post Title")}}</label>
                    <input class="form-control" name="post_title" type="text">
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__("Post URL")}}</label>
                    <input class="form-control" name="post_url" type="text">
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
              
            <div class="card-footer text-right">
              
            </div>
          
        </div>
      </div>
      </form>
    </div>
    </div>
  </div>
@endsection

 