  @extends('includes.master')
  @section('content')    
<div class="right_col" role="main">
            <div class="row  class="right_col"">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
              
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    <b style="font-size: 30px">Product</b>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Product Type</th>
                          <th>Commission Mode</th>
                          <th>Commission Percentagee</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($query as $val)
                        <tr>
                          <td>{{$val->id}}</td>
                          <td>{{$val->name}}</td>
                          <td>{{$val->product_type_id}}</td>
                           <td>{{$val->commission_mode}}</td>
                           <td>{{$val->commission_percentage}}</td>
                          <td><button onclick="location.href='http:/products/add';">Add</button> <button onclick="location.href='http:/products/view/{id}';">View</button> <button onclick="location.href='http:/products/edit';">Edit</button> <button onclick="location.href='http:/products/delete';">Delete</button></td>
                        </tr>
                        @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
  @endsection