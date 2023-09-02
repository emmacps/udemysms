@extends('admin.admin_master')
@section('admin')


 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
        <section class="content">
			
			<div class="row">
				<div class="col-12">
				  <div class="box">				  
					<div class="box-header with-border">
					  <h4 class="box-title">Update User Form</h4>
					</div>

                    <form method="post" action="{{ route('users.update', $editData->id) }}">
                        @csrf
					<div class="box-body">
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $editData['name']}}" required>
                            </div>
                        </div>					
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select User Role</label>
                                    <select name="usertype" id="select" class="form-control" required>
                                        <option value="" selected="" disabled>Select Role</option>
                                        <option value="Admin" {{ ($editData->usertype == "Admin" ? "Selected" : "") }}>Admin</option>
                                        <option value="User" {{ ($editData->usertype == "User" ? "Selected" : "") }}>User</option>
                                    </select>
                                </div>
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $editData['email']}}" required>
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-rounded btn-success">Update</button>
                    </form>

			  </div>
			</div>
		</section>
    
    </div>
</div>
<!-- /.content-wrapper -->

@endsection