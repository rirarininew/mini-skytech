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
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Details Posting")}}</h5>
            
            <div class="row">
              <div class="col-md-12">
                <a type="button" class="btn btn-danger btn-round float-right" href="{{ route('posting.delete', $Post->post_id)}}">{{__('delete')}}</a>
                <a type="button" class="btn btn-success btn-round float-right" href="{{ route('posting.edit', $Post->post_id)}}">{{__('edit')}}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
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
                    <div class="row">
                      <div class="col-md-3"><label>{{ __('Posted By') }}</label></div>
                      <div class="col-md-9"><label">{{ $Uname }}</label></div>
                    </div>
                  </div>
                  <div class="col-md-1">
                </div>
              
            <div class="card-footer text-center">
              <a type="button" class="btn btn-primary btn-round " href="{{ route('posting.index') }}">{{__('Back')}}</a>
            </div>
          
        </div>
      </div>
    </div>

    </div>
  </div>
@endsection

@section('js')

@endsection