@extends('layouts.admin')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modul
        <small>Master Merk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Modul</li>
        <li class="active">Master Merk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="row">
	        <div class="col-md-12">
	          <div class="box box-solid">
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="box-group" id="accordion">
	                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	                <div class="panel box ">
	                  <div class="box-header with-border">
	                    <h4 class="box-title pull-right">
	                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	                        <i class="fa fa-plus"></i> Add
	                      </a>
	                    </h4>
	                  </div>
	                  <div id="collapseOne" class="panel-collapse collapse">
	                      <form role="form" action="{{url('/savemodulmerk')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
			              <div class="box-body">
			                <div class="form-group">
			                  <label>Code Merk</label>
			                  <input type="text" name="code" class="form-control"  placeholder="Code" required>
			                </div>
			                <div class="form-group">
			                  <label>Merk</label>
			                  <input type="text" name="merk" class="form-control"  placeholder="Merk" required>
			                </div>
			                
			              
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary pull-right">Submit</button>
			              </div>
			            </form>
	                  </div>
	                </div>
	                 <div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Master Merk Table</h3>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			            <div class="box-body table-responsive no-padding">
			              <table class="table table-hover">
			                <thead>
			                <tr>
			                  <th>ID</th>
			                  <th>Code</th>
			                  <th>Merk</th>
			                  <th colspan="2">Action</th> 
			                </tr>
			                </thead>
			                <tbody>
                        	@foreach($data as $merk)
			                <tr>
			                  <td>{{ $merk->id }}</td>
			                  <td>{{ $merk->code }}</td>
			                  <td>{{ $merk->merk }}</td>
			                  <td>
			                  <a href="{{ url('/edit/merk/'.$merk->id) }}"><i class="fa fa-pencil" style="font-size: 16px !important"></i> Edit</a>
			                  </td>
			                  <td>
                          	  <a href="{{ url('/delete/merk/'.$merk->id) }}" onclick="return confirm('Delete?')"><i class="fa fa-times"></i> Delete</a>
                          	  </td>
			                </tr>
			                 @endforeach
			                </tbody>
             			 </table>
             			 </div>
             			  
			            </div>
			            	<div class="box-footer clearfix">
				              	<ul class="pagination pagination-sm no-margin pull-right">
								{!! $data->render() !!}
								</ul>
				            </div>	
			             	

			            <!-- /.box-body -->
			        </div>
			          <!-- /.box -->
				        
	              </div>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->
	</div>
</section>
</div>


@endsection