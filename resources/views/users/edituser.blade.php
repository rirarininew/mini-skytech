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
            <h5 class="title">{{__(" Edit User")}}</h5>
            <div class="row">
              <div class="col-md-12">
                
                @if($Post->id != 1)
                <form method="POST" action="{{ route('user.status', $Post->id) }}">
                @csrf
                @method('put')

                  @if($Post->status == 1)
                  <input type="text" name="status" value="0" hidden>
                  @elseif($Post->status == 0)
                  <input type="text" name="status" value="1" hidden>
                  @endif

                  @if($Post->status == 0)
                  <button type="submit" class="btn btn-secondary btn-round float-right">{{__('inactive')}}</button>
                  @elseif($Post->status == 1)
                  <button type="submit" class="btn btn-primary btn-round float-right">{{__('active')}}</button>
                  @endif
                </form>
                @endif

              </div>
            </div>
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

            <form method="POST" action="{{ route('user.update', $Post->id) }}">
              @csrf
              @method('put')

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input name -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                      </div>
                    </div>
                    <input class="form-control" type="text" name="name" value="{{ $Post->name }}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input email -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons ui-1_email-85"></i>
                      </div>
                    </div>
                    <input class="form-control" type="email" name="email" value="{{ $Post->email }}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <!--Begin input password -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i>
                      </div>
                    </div>
                    <input class="form-control" type="password" name="password" value="{{ $Post->password }}">
                  </div>
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

 