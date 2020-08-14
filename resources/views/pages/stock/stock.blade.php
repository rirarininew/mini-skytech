@extends('layouts.app', [
    'namePage' => 'Manage Stock',
    'class' => 'sidebar-mini',
    'activePage' => 'stock',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('stock.create') }}">Add data</a>
            <h4 class="card-title">Stocks</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Invoice No.</th>
                  <th>Date in</th>
                  <th>Supplier ID</th>
                  <th>Product Code</th>
                  <th>Qty</th>
                  <th>Price</th>
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
              <tbody>
                  <tr>
                    <td>INVABC123</td>
                    <td>07/08/2020</td>
                    <td>SUP1</td>
                    <td>ABC123</td>
                    <td>90 PCS</td>
                    <td class="text-primary">IDR 9000.000</td>
                    <td class="text-right">
                      <a type="button" href="{{ route('stock.detail') }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>INVDEF456</td>
                    <td>08/08/2020</td>
                    <td>SUP1</td>
                    <td>DEF456</td>
                    <td>100 PCS</td>
                    <td class="text-primary">IDR 10.000.000</td>
                    <td class="text-right">
                      <a type="button" href="#" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>INVGHI789</td>
                    <td>09/08/2020</td>
                    <td>SUP2</td>
                    <td>GHI789</td>
                    <td>110 PCS</td>
                    <td class="text-primary">IDR 11.000.000</td>
                    <td class="text-right">
                      <a type="button" href="#" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
@endsection