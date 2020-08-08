@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('Edit Post')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('posting.update', $Post->post_id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Post') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
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

                
                <input class="form-control" name="post_id" value="{{ $Post->post_id }}" hidden="" />
                    

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('SKU') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="product_sku" value="{{ $Post->product_sku }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Product Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="product_name" value="{{ $Post->product_name }}" type="text"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Channel') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="channel_type" value="{{ $Post->channel_type }}" type="text"/>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Channel Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="channel_name" id="input-wholesaleprice" type="text" value="{{ $Post->channel_name }}" disabled="true" />
                    </div>
                  </div>
                </div>
                

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-dropship">{{ __('City') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control text-uppercase" value="{{ $Post->channel_city }}" name="channel_city" data-selected="">
                        @foreach($data_city as $c)
                        <option selected>{{ $Post->channel_city }}</option>
                        <option value="{{ $c->name }}">{{ $c->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('URL') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_url" id="input-price" type="text" value="{{ $Post->post_url }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="post_title" id="input-price" type="text" value="{{ $Post->post_title }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="price" id="input-discount" type="text" value="{{ $Post->price }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" value="{{ $Post->status }}" name="status" data-selected="">
                        <option selected>{{ $Post->status }}</option>
                        <option value="new">new</option>
                        <option value="renew">renew</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="photo" id="input-discount" type="text" value="{{ $Post->photo }}"/>
                      <img width="150px" src="{{ url('/data_image/'.$Post->photo) }}">
                    </div>
                  </div>
                </div>

              <div class="card-footer">
                <div class="row">
                  <div class="col-md-3">
                    <a type="button" href="{{ route('posting.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                  </div>
                  <div class="col-md-1">
                    
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                  </div>
                  <div class="col-md-5"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection