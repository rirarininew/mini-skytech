@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('POSTING')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">ALL POSTING</h4>
          </div>

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

          <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <td>
                    
                  </td>
                  <td>
                    <form action="{{ route('posting.caritgl') }}" method="GET">
                      <input type="date" class="form-control" name="caritgl">
                  </td>
                  <td>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                      </button>
                    </form>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <form action="{{ route('posting.cari') }}" method="GET">
                      <select class="form-control" name="cari" placeholder="cari status">
                        <option selected>Filter By Status</option>
                        <option value="new">New</option>
                        <option value="renew">Renew</option>
                      </select>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                    </button>
                  </td>
                  <td>
                    
                  </td>
                  <td>
                    <a type="button" class="btn btn-secondary" href="{{ route('posting.index') }}">refresh</a>
                    </form>
                  </td>
                </tr>
                </tbody>
                
              </table>
            </div>

          <div class="card-body">

            <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('posting.create') }}" class="btn btn-sm btn-primary">ADD POST</a>
                </div>
              </div>

            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Created at
                  </th>
                  <th>
                    SKU
                  </th>
                  <th>
                    Product Name
                  </th>
                  <th>
                    Channel Type
                  </th>
                  <th>
                    Channel Name
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Image
                  </th>
                  <th class="text-success">
                    Actions
                  </th>
                </thead>
                @if(Auth::user()->id == 1)
                @foreach($data_posting as $o)
                <tbody>
                  <tr>
                    <td>
                      {{ $o->created_at }}
                    </td>
                    <td>
                      {{ $o->product_sku }}
                    </td>
                    <td>
                      {{ $o->product_name }}
                    </td>
                    <td>
                      {{ $o->channel_type }}
                    </td>
                    <td>
                      {{ $o->channel_name }}
                    </td>
                    <td>
                      {{ $o->status }}
                    </td class="text-success">
                    <td>
                      <a href="{{ route('posting.detail', $o->post_id)}}">
                      <img width="100px" src="{{ url('/data_image/'.$o->photo) }}">
                      </a>
                    </td>
                    <td class="td-actions">
                      <a href="{{ route('posting.edit', $o->post_id)}}" class="btn btn-success btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="{{ route('posting.delete', $o->post_id)}}" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
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
                      {{ $p->created_at }}
                    </td>
                    <td>
                      {{ $p->product_sku }}
                    </td>
                    <td>
                      {{ $p->product_name }}
                    </td>
                    <td>
                      {{ $p->channel_type }}
                    </td>
                    <td>
                      {{ $p->channel_name }}
                    </td>
                    <td>
                      {{ $p->status }}
                    </td class="text-success">
                    <td>
                      <img width="100px" src="{{ url('/data_image/'.$p->photo) }}">
                    </td>
                    <td class="td-actions">
                      <a href="{{ route('posting.edit', $p->post_id)}}" class="btn btn-success btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="{{ route('posting.delete', $p->post_id)}}" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endif
                @endforeach
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection


<!-- KITA GUNAKAN LIBRARY DATERANGEPICKER -->
@section('js')
<script>
  $function(){
        $(.date).datetimepicker({
    });
</script>
@endsection()

