@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('Add Post')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <form method="post" action="{{ route('posting.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Post') }}</h4>
                <!-- <p class="card-category">{{ __('User information') }}</p> -->
              </div>
              <div class="card-body ">
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

                
                <input class="form-control" name="user_id" type="text" value="{{ Auth::user()->id }}" hidden/>
                    

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-category">{{ __('SKU') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="product_sku" for="input-category" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-product_name">{{ __('Product Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="product_name" for="input-product_name" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Channel Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" name="channel_type">
                        <option value="lazada">Lazada</option>
                        <option value="tokopedia">Tokopedia</option>
                        <option value="facebook marketplace">Facebook Marketplace</option>
                        <option value="forum">Forum</option>
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-wholesale_price">{{ __('Channel Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="channel_name" for="input-wholesale_price" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-product_price">{{ __('City') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      
                      <select class="form-control text-uppercase" name="channel_city" id="city_id_" data-selected="">
                        @foreach($data_city as $c)
                        <option value="{{ $c->name }}">{{ $c->name }}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-discount">{{ __('URL') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_url" for="input-discount" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-discount">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_title" for="input-discount" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-discount">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="price" for="input-discount" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" name="status">
                        <option value="new">New</option>
                        <option value="renew">Renew</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-productimage">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <label for="input-productimages">Example file input</label>
                      <input type="file" class="form-control-file" name="photo" id="input-productimages">
                    </div>
                  </div>
                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
