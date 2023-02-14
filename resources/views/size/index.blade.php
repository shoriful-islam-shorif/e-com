@extends('admin.admin_mester')
@section('index_content')

  @if (session()->has('success'))
                    <div class="alert alert-success"role="alert">
                       {{ session()->get('success') }}
                    </div>
                    
                    @endif
   <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width:10%">id</th>
								  <th style="width:40% ">Size</th>
								  <th style="width:20% ">Status</th>
								  <th style="width:30% ">Actions</th>
							  </tr>
						  </thead>   
						  @foreach ($sizes as $size )
							
						 
						  <tbody>
							<tr>
								<td>{{ $size->id }}</td>

                              <td>
                                  @foreach (json_decode($size->size) as $sizes )
									 <span class="badge badge-warning">{{ $sizes }}</span>
                                @endforeach
                              </td>

								<td class="center">
									@if($size->status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Dective</span>
									@endif

								</td>
								
								<td class="row">
									<div class="span3"></div>
									<div class="span2">
										@if($size->status==1)
									<a class="btn btn-success" href="{{ route('cat_status',$size->id) }}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{ route('cat_status',$size->id) }}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									</div>
									<div class="span2">
									<a class="btn btn-info" href="{{ route('sizes.edit',$size->id) }}">
										<i class="halflings-icon white edit"></i>  
									</a>
									</div>
									<div class="span2">
									<form action="{{ route('sizes.destroy',$size->id) }}"  method="post">
										@csrf
										@method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
										
									</a>
									</form>
									</div>
									<div class="span3"></div>
								</td>
							</tr>
							
						  </tbody>
						   @endforeach
					  </table>    
					  
				</div><!--/span-->
			
			</div><!--/row-->
@endsection
