@extends('layouts.app', ['activePage' => 'posting', 'titlePage' => __('Product Details')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Product Details') }}</h4>
                <!-- <p class="card-category">{{ __('User information') }}</p> -->
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

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-waranty">{{ __('Category') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('Category') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Product Image') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('image here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Product Name') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('product name here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="exampleFormControlTextarea1">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('description here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-waranty">{{ __('Waranty') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('waranty here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-wholesale">{{ __('Wholesale') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('wholesale here') }}</label>
                  </div>
                </div>

                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Wholesale Price') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('wholesale price here') }}</label>
                  </div>
                </div>
                

                <div class="row">
                  <label class="col-sm-2 col-form-label" id="input-dropship">{{ __('Dropship') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('dropship here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Product Price') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('product price here') }}</label>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Discount') }}</label>
                  <div class="col-sm-7">
                    <label class="col-form-label" id="input-waranty" style="color:#444">{{ __('discount here') }}</label>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection