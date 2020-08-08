@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('Detail Post')])

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
                <h4 class="card-title">{{ __('Detail Post') }}</h4>
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

                
                <div class="row">
                  <div class="col-md-4">
                    <img width="400px" src="{{ url('/data_image/'.$Post->photo) }}">
                  </div>
                  <div class="col-md-1">
                    
                  </div>
                  <div class="col-md-6">
                    <div class="row" style="padding-top:1.5rem">
                      <div class="col-md-3"><label>{{ __('ID') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->post_id }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('SKU') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->product_sku }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Product Name') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->product_name }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Channel Type') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->channel_type }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Channel Name') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->channel_name }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Channel City') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->channel_city }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('URL') }}</label></div>
                      <div class="col-md-9"><a href="{{ $Post->post_url }}">{{ $Post->post_url }}</a></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Title') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->post_title }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Price') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->price }}</label></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Status') }}</label></div>
                      <div class="col-md-9"><label">{{ $Post->status }}</label></div>
                    </div>
                  </div>
                  <div class="col-md-1">
                    
                  </div>
                </div>
                
              <div class="card-footer">
                <a type="button" href="{{ route('posting.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection