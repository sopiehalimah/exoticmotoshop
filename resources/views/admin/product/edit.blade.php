@extends('layouts.admin')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modul
        <small>Edit Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Modul</li>
        <li class="active">Edit Product</li>
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
	                      <a href="{{url('/product/modul')}}">
	                        <i class="fa fa-arrow-left"></i> Back
	                      </a>
	                    </h4>
	                  </div>
	                      <form role="form" action="{{url('/updatemodulproduct')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                           	  
			              <div class="box-body">
			              	<div class="form-group">
			                  <label>Code Product</label>
			                  <input type="text" name="code" class="form-control" required value="{{ $data->code }}" readonly >
			                  <input type="hidden" name="id" value="{{ $data->id }}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                              <input type="hidden" name="codemerk" value="{{$data->codemerk }}"> 
                              <input type="hidden" name="codejenis" value="{{ $data->codejenis }}"> 
                              <input type="hidden" name="jenis" value="{{ $data->jenis }}"> 
			                </div>
				           <!--  <div class="form-group">
				                <label>Master Merk</label>
				                <select class="form-control select2" name="codemerk"  style="width: 100%;" required>
				                  @foreach($master_merks as $key => $master_merk)
                                      <option value="{{ $master_merk->code }}">{{ $master_merk->merk }}</option>
                                  @endforeach
				                </select>
				            </div>
							<div class="form-group">
				                <label>Master Jenis</label>
				                <select class="form-control select2" name="codejenis" style="width: 100%;" required>
				                  @foreach($master_jeniss as $key => $master_jenis)
                                      <option value="{{ $master_jenis->code }}">{{ $master_jenis->jenis }}</option>
                                  @endforeach
				                </select>
				            </div>
				            <div class="form-group">
				                <label>Jenis</label>
				                <select class="form-control select2" name="jenis"  style="width: 100%;" required>
				                 @foreach($jeniss as $key => $product)
                                      <option value="{{ $product->code }}">{{ $product->name }}</option>
                                 @endforeach
				                </select>
				            </div> -->
				            <div class="form-group">
			                	 <div style="max-width: 50%;height: 10%;"><img class="img-thumbnail" src="{{ url('image/'.$data->image1) }}">
                                </div>
			                </div>
				            <div class="form-group">
			                  <label>Image</label>
			                  <input type="file" name="image1" value="{{ $data->image1 }}"  class="form-control-file">
			                </div>
			                <div class="form-group">
			                  <label>Desc</label>
			                  <input type="text" name="desc" class="form-control"  value="{{ $data->desc }}" required>
			                </div>
			                <div class="form-group">
			                  <label>Price</label>
			                  <input type="number" name="price" class="form-control" value="{{ $data->price }}" required>
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