@extends('layouts.admin')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modul
        <small>Edit Jenis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Modul</li>
        <li class="active">Edit Jenis</li>
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
	                      <a href="{{url('/jenis/modul')}}">
	                        <i class="fa fa-arrow-left"></i> Back
	                      </a>
	                    </h4>
	                  </div>
	                      <form role="form" action="{{url('/updatemoduljenis')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
			              <div class="box-body">
			                <div class="form-group">
			                  <label>Code Jenis</label>
			                  <input type="text" name="code" value="{{ $data->code }}" class="form-control"  placeholder="Code">
			                  <input type="hidden" name="id" value="{{ $data->id }}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                </div>
			                <div class="form-group">
				                <label>Master Jenis</label>
				                <select class="form-control select2" placeholder="Select Master Jenis" name="codejenis" style="width: 100%;">
				                  @foreach($master_jeniss as $key => $master_jenis)
                                      <option value="{{ $master_jenis->code }}">{{ $master_jenis->jenis }}</option>
                                  @endforeach
				                </select>
				            </div>
			                <div class="form-group">
			                  <label>Jenis</label>
			                  <input type="text" name="name" value="{{ $data->name }}" class="form-control"  placeholder="Merk">
			                </div>
			                
			              
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary pull-right">Submit</button>
			              </div>
			            </form>
	                  <!-- </div> -->
	                </div>
				        
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