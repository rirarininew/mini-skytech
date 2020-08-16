@extends('layouts.app', [
    'namePage' => 'Manage Post',
    'class' => 'sidebar-mini',
    'activePage' => 'channel',
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

              <!-- <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('posting.create') }}">Add data</a> -->
              <h4 class="card-title">Posting</h4>
              <div class="col-12 mt-2"></div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <table class="table">
                <tbody>
                <tr>
                  <td>
                    <form action="{{ route('posting.carichannel') }}" method="GET">
                      <select class="form-control" name="carichannel">
                        <option selected>Filter By Channel</option>
                        <option value="lazada">Lazada</option>
                        <option value="tokopedia">Tokopedia</option>
                        <option value="shopee">Shopee</option>
                        <option value="olx">OLX</option>
                        <option value="bukalapak">Bukalapak</option>
                        <option value="facebook marketplace">Facebook Marketplace</option>
                        <option value="forum">Forum</option>
                      </select>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                      </button>
                    </form>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a type="button" class="btn btn-success btn-round text-white pull-right" href="{{ route('posting.carichannel') }}">refresh</a>
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
                  <th>Channel Name</th>
                  <th>Status</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>Profile</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </tfoot> -->
              @if(Auth::user()->id == 1)
                @foreach($data_posting as $o)
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
                    <td>{{ $o->channel_name }}</td>
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
                  <td>{{ $o->channel_name }}</td>
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