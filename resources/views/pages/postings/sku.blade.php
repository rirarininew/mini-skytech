@extends('layouts.app', [
    'namePage' => 'Manage Post',
    'class' => 'sidebar-mini',
    'activePage' => 'sku',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            
            <h5 class="title">
              
                {{ $tmp }}
              </h5>
              
          
      </div>
    </div>

    </div>
  </div>
@endsection