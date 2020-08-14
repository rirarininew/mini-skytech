@extends('layouts.app', [
    'namePage' => 'Manage User',
    'class' => 'sidebar-mini',
    'activePage' => 'users',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('user.create') }}">Add data</a>
            <h4 class="card-title">Users</h4>
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <!-- <th>Verified at</th> -->
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
              @foreach($users as $o)
              <tbody>
                  <tr>
                    <!-- <td>
                      <span class="avatar avatar-sm rounded-circle">
                        <img src="{{asset('assets')}}/img/default-avatar.png" alt="" style="max-width: 80px; border-radiu: 100px">
                      </span>
                    </td> -->
                    <td>{{ $o->id }}</td>
                    <td>{{ $o->name }}</td>
                    <td>{{ $o->email }}</td>
                    <!-- <td>{{ $o->email_verified_at   }}</td> -->
                    <td class="pull-right">
                      <a type="button" href="{{ route('user.edit', $o->id)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                    </td>
                  </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
@endsection