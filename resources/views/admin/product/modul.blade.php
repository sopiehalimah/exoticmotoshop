@extends('layouts.admin')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modul
        <small> Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Modul</li>
        <li class="active"> Product</li>
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
	                      <form role="form" action="{{url('/savemodulproduct')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
			              <div class="box-body">
			                <div class="form-group">
			                  <label>Code Product</label>
			                  <?php
                                $a = rand(0,999);
                                $b = rand(0,9);
                                if ($a<100) {
                                  $code = "EXO-".$b.substr($a,0,5);
                                  $randomkode = "EXO-".$b.substr($a,0,5);
                                }
                                elseif ($a<100) {
                                  $code = "EXO-".$b.$b.substr($a,0,4);
                                  $randomkode = "EXO-".$b.$b.substr($a,0,4);
                                }
                                elseif ($a<10) {
                                  $code = "EXT-".$b.$b.$b.substr($a,0,3);
                                  $randomkode = "EXO-".$b.$b.$b.substr($a,0,3);
                                }
                                elseif ($a<10) {
                                  $code = "EXO-".$b.$b.$b.$b.substr($a,0,2);
                                  $randomkode = "EXO-".$b.$b.$b.$b.substr($a,0,2);
                                }              
                                else {
                                  $code = "EXO".$a;
                                  $randomkode = "EXO-".$a;
                                }
                              ?>
			                  <input type="text" name="code" class="form-control" required value="{{ $randomkode}}" readonly>
			                </div>
			                <div class="form-group">
				                <label>Master Merk</label>
				                <select class="form-control select2" name="codemerk" style="width: 100%;" required>
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
				                <select class="form-control select2" name="jenis" style="width: 100%;" required>
				                 @foreach($jeniss as $key => $jenis)
                                      <option value="{{ $jenis->code }}">{{ $jenis->name }}</option>
                                 @endforeach
				                </select>
				            </div>
				            <div class="form-group">
			                  <label>Image</label>
			                  <input type="file" name="image1" class="form-control-file" required>
			                </div>
			                <div class="form-group">
			                  <label>Desc</label>
			                  <input type="text" name="desc" class="form-control"  placeholder="Description" required>
			                </div>
			                <div class="form-group">
			                  <label>Price</label>
			                  <input type="number" name="price" class="form-control"  placeholder="Price" required>
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
			              <h3 class="box-title">Product Table</h3>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			            <div class="box-body table-responsive no-padding">
			              <table class="table table-hover">
			                <thead>
			                <tr>
			                  <th>Code Product</th>
			                  <th>Image</th>
			                  <th>Desc</th>
			                  <th>Price</th>
			                  <th colspan="2">Action</th> 
			                </tr>
			                </thead>
			                <tbody>
                        	@foreach($data as $product)
			                <tr>
			                  <td>{{ $product->code }}</td>
			                  <td><img src="{{ url('image/'.$product->image1) }}" alt="" style="max-width:100%;height: 40px;"></td>
			                  <td>{{ $product->desc }}</td>
			                  <td>{{ $product->price }}</td>
			                  <td>
			                  <a href="{{ url('/edit/product/'.$product->id) }}"><i class="fa fa-pencil" style="font-size: 16px !important"></i> Edit</a>
			                  </td>
			                  <td>
                          	  <a href="{{ url('/delete/product/'.$product->id) }}" onclick="return confirm('Delete?')"><i class="fa fa-times"></i> Delete</a>
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