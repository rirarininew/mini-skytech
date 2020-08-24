@extends('layouts.app', [
    'namePage' => 'SKYTECH Post',
    'class' => 'sidebar-mini',
    'activePage' => 'posting',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            @if (session('success'))
            <div class="col-md-12">
              <div class="alert alert-success">{{ session('success') }}</div>
            </div>
          @endif
          @if (session('error'))
            <div class="col-md-12">
              <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
          @endif

              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('posting.create') }}">Add data</a>
              <h4 class="card-title">Posting</h4>
              <div class="col-12 mt-2"></div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <table class="table">
                <tbody>
                <form action="{{ route('posting.cari') }}" method="GET">
                <tr>
                  <td>
                      <input type="date" class="form-control pull-left" name="created_at">
                  </td>
                  <td>
                    <select class="form-control" name="status">
                        <option selected>Filter By Status</option>
                        <option value="new">New</option>
                        <option value="renew">Renew</option>
                    </select>
                  </td>
                  <td>
                    
                    <select class="form-control" name="user_id">
                        <option selected>Filter By User</option>
                        @foreach($data_user as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                    
                  </td>
                  <td>
                    <input type="text" class="form-control pull-left" name="product_sku" placeholder="Enter SKU">
                  </td>
                  <td>
                    <button type="submit" class="btn btn-secondary btn-round btn-just-icon">
                      <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </button>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <a type="button" class="btn btn-secondary btn-round text-white pull-right" href="{{ route('posting.index') }}"><i class="now-ui-icons loader_refresh"></i></a>
                    </form>
                  </td>
                </tr>
                </tbody>
                
              </table>
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Created at</th>
                  <th>SKU</th>
                  <th>Product Name</th>
                  <th>Channel Type</th>
                  <th>Post Title</th>
                  <th>Status</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              @if(Auth::user()->id == 1)
                @foreach($data_posting as $o)
                <tfoot></tfoot>
              <tbody>
                  <tr style="background-color:#ffffff">
                    <td class="text-center">
                      <span class="avatar avatar-sm">
                        <img src="{{ url('/data_image/'.$o->photo) }}" alt="" style="max-width: 80px;">
                      </span>
                    </td>
                    <td>{{ $o->created_at }}</td>
                    <td>{{ $o->product_sku }}</td>
                    <td>{{ $o->product_name }}</td>
                    <td>{{ $o->channel_type }}</td>
                    <td><a href="{{ $o->post_url }}" target="_blank">{{ $o->post_title }}</a></td>
                    <td>{{ $o->status }}</td>
                    <td class="text-right">
                      <a type="button" href="{{ route('posting.detail', $o->post_id)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                    </td>
                  </tr>
              </tbody>
              @endforeach
              @endif

              @if(Auth::user()->id != 1)
              @foreach($data_posting as $p)
              @if($p->user_id == Auth::user()->id)
              <tbody>
                <tr>
                  <td>
                    <span class="avatar avatar-sm rounded-circle">
                      <img src="{{ url('/data_image/'.$o->photo) }}" alt="" style="max-width: 80px; border-radius: 100px">
                    </span>
                  </td>
                  <td>{{ $o->created_at }}</td>
                  <td>{{ $o->product_sku }}</td>
                  <td>{{ $o->product_name }}</td>
                  <td>{{ $o->channel_type }}</td>
                  <td><a href="{{ $o->post_url }}" target="_blank">{{ $o->post_title }}</a></td>
                  <td>{{ $o->status }}</td>
                  <td class="text-right">
                    <a type="button" href="{{ route('posting.detail', $o->post_id)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                      <i class="now-ui-icons ui-2_settings-90"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
              @endif
              @endforeach
              @endif
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
@endsection