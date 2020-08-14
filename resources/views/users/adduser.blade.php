@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Manage User',
    'activePage' => 'user',
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
            <h5 class="title">{{__(" Add User")}}</h5>
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

            <form method="POST" action="{{ route('user.store') }}">
              @csrf

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input name -->
                  <div class="input-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                      </div>
                    </div>
                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                      @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input email -->
                  <div class="input-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons ui-1_email-85"></i>
                      </div>
                    </div>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                  </div>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input password -->
                  <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i>
                      </div>
                    </div>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                      @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input confirm password -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i></i>
                      </div>
                    </div>
                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                  </div>
                </div>
              </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-round btn-lg">{{__('Submit')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

 