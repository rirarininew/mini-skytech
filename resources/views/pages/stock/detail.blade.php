@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Manage Stock',
    'activePage' => 'stock',
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
            <h5 class="title">{{__(" Details Stock")}}</h5>

            <div class="row">
              <div class="col-md-12">
                <a type="button" class="btn btn-danger btn-round float-right" href="{{ route('home') }}">{{__('delete')}}</a>
                <a type="button" class="btn btn-success btn-round float-right" href="{{ route('home') }}">{{__('edit')}}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Invoice No.")}}</label>
                    <input class="form-control" name="invoice_no" type="text" value="INV1BC123">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Date in")}}</label>
                    <input class="form-control" name="date_in" type="date" value="10/08/2020">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Suplier ID")}}</label>
                    <select class="custom-select" name="suplier_id">
                      <option selected>SUP01</option>
                      <option value="1">SUP01</option>
                      <option value="2">SUP02</option>
                      <option value="3">SUP03</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Product Code")}}</label>
                    <select class="custom-select" name="product_code">
                      <option selected>ABC123</option>
                      <option value="1">ABC123</option>
                      <option value="2">DEF456</option>
                      <option value="3">GHI789</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>

              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Qty")}}</label>
                    <input class="form-control" name="qty" type="text" value="200">
                  </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>{{__(" Price")}}</label>
                    <input class="form-control" name="price" type="text" value="9000">
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
              
            <div class="card-footer text-center">
              <a type="button" class="btn btn-primary btn-round " href="{{ route('home') }}">{{__('Back')}}</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection

@section('js')

@endsection