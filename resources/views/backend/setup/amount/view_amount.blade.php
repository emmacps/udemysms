@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Fee Amount List</h3>
					<a href="{{ route('fee.amount.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Fee Amount </a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>  
				<th>Category</th>
				<!-- <th>Class</th>  -->
				<th>Amount</th>
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $item )
			<tr>
				<td> {{ $item['fee_category']['name'] }}</td>	
			
				<td> {{ $item->amount }}</td>				 
				<td>
                    <a href="{{route('fee.amount.edit',$item->fee_category_id)}}" class="btn btn-info">Edit</a>
                    <a href="" class="btn btn-danger" id="delete">Delete</a>
				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection