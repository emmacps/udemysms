@extends('admin.admin_master')
@section('admin')

  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Users List</h3>
                  <a href="{{ route('users.add')}}" class="float-right btn btn-primary">Add New User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>S/No</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key => $user)
                            <tr>
								<td>{{ $key+1 }}</td>
								<td>{{$user->usertype}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
                                    <a href="{{ route('users.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('users.delete',$user->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
							</tr>
                            @endforeach
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
  
@endsection