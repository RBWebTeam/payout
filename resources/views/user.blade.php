  @extends('includes.master')
  @section('content')    
<div class="right_col" role="main">
            <div class="row  class="right_col"">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
              
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <b style="font-size: 30px">Users</b>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                      
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Role</th>
                          <th>Product Type</th>
                          <th>Create Date</th>
                          <th>Modify Date</th>
                          <th>Active</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($query as $val)
                        <tr>
                          <td>{{$val->id}}</td>
                          <td>{{$val->name}}</td>
                          <td>{{$val->mobile}}</td>
                          <td>{{$val->email}}</td>
                          <td>{{$val->password}}</td>
                          <td>{{$val->role_id}}</td>
                          <td>{{$val->product_type_id}}</td>
                          <td>{{$val->create_date}}</td>
                          <td>{{$val->modify_date}}</td>
                          <td>{{$val->active}}</td>

                         <td><a class="btn btn-round btn-info" href="{{url('users/view')}}/{{$val->id}}">View</a> <a class="btn btn-round btn-primary" href="{{url('users/edit')}}/{{$val->id}}">Edit</a> <a class="btn btn-round btn-success" href="{{url('users/delete')}}/{{$val->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                        
                        @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
  @endsection