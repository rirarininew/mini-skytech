@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('Add Post')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <form method="post" action="{{ route('posting.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

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
                  <label class="col-sm-2 col-form-label" id="input-sku">{{ __('SKU') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="product_sku" for="input-sku" type="text"/>
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
                  <label class="col-sm-2 col-form-label" id="input-channel_name">{{ __('Channel Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="channel_name" for="input-channel_name" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-city">{{ __('City') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      
                      <!-- <select class="form-control text-uppercase" name="channel_city" id="city_id_" data-selected="">
                        @foreach($data_city as $c)
                        <option value="{{ $c->name }}">{{ $c->name }}</option>
                        @endforeach
                      </select> -->

                      <input class="form-control" name="channel_city" for="input-city" type="text"/>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-url">{{ __('URL') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_url" for="input-url" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-title">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_title" for="input-title" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-price">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="price" for="input-price" type="text"/>
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
                  <label class="col-sm-2 col-form-label" id="input-productimages">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                     <div class="form-group form-file-upload form-file-multiple">
                        <input type="file" multiple="" class="inputFileHidden" name="photo">
                          <div class="input-group">
                            <input type="text" class="form-control inputFileVisible" placeholder="Upload Image">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-fab btn-round btn-primary">
                                <i class="material-icons">attach_file</i>
                              </button>
                            </span>
                          </div>
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


