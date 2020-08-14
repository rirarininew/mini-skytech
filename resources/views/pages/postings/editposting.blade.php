@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Update Posting',
    'activePage' => 'posting',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Update Posting")}}</h5>
          </div>
          <div class="card-body">
            @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
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

            <form method="post" action="{{ route('posting.update', $Post->post_id) }}" autocomplete="off" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('put')

              <input class="form-control" name="post_id" value="{{ $Post->post_id }}" hidden="" />
              <input class="form-control" name="user_id" type="text" value="{{ $Post->user_id }}" hidden/>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" SKU")}}</label>
                    <input class="form-control" name="product_sku" type="text" value="{{ $Post->product_sku }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Product Name")}}</label>
                    <input class="form-control" name="product_name" type="text" value="{{ $Post->product_name }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Channel Type")}}</label>
                      <select class="form-control" name="channel_type">
                        <option selected="">{{ $Post->channel_type }}</option>
                        <option value="lazada">Lazada</option>
                        <option value="tokopedia">Tokopedia</option>
                        <option value="facebook marketplace">Facebook Marketplace</option>
                        <option value="forum">Forum</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Channel Name")}}</label>
                    <input class="form-control" name="channel_name" type="text" value="{{ $Post->channel_name }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" City")}}</label>
                    <input class="form-control" name="channel_city" type="text" value="{{ $Post->channel_city }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" URL")}}</label>
                    <input class="form-control" name="post_url" type="text" value="{{ $Post->post_url }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Title")}}</label>
                    <input class="form-control" name="post_title" type="text" value="{{ $Post->post_title }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Price")}}</label>
                    <input class="form-control" name="price" type="text" value="{{ $Post->price }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Image")}}</label><br>
                    <img src="{{ url('/data_image/'.$Post->photo) }}" for="profile-img" width="200px" />
                    <input type="file" class="form-control-file" id="profile-img" name="photo" value="{{ $Post->photo }}">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                  <label>{{__(" status")}}</label><br>
                    <select class="form-control" name="status">
                        <option selected="">{{ $Post->status }}</option>
                        <option value="new">New</option>
                        <option value="renew">Renew</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
              
            <div class="card-footer text-center">
              <button type="Submit" class="btn btn-primary btn-round ">{{__('Submit')}}</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection

 