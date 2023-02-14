@extends('admin.admin_mester')
@section('admin_content')
@php
    use Illuminate\Support\Facades\Session;
@endphp
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

            </div>

            <div class="box-content">
                 @if (session()->has('success'))
                    <div class="alert alert-success"role="alert">
                       {{ session()->get('success') }}
                    </div>
                    
                    @endif
                <form class="form-horizontal" action="{{ route('products.index') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Code</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="code" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>
                        

                        <div class="control-group">
                            <label for="" class="control-label">Select Category</label>
                            <div class="control">
                                <select name="category" id="" style="margin-left:20px;">
                                  <option value=""> Category</option>
                                  @foreach ($categories as $category )
                                      
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="" class="control-label">Select SubCategory</label>
                            <div class="control">
                                <select name="subcategory" id="" style="margin-left:20px;">
                                  <option value=""> SubCategory</option>
                                  @foreach ($subcategories as $subcategory )
                                      
                                  <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="" class="control-label">Select Brand </label>
                            <div class="control">
                                <select name="brand" id="" style="margin-left:20px;">
                                  <option value=""> Brand</option>
                                  @foreach ($brands as $brand )
                                      
                                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="" class="control-label">Select Unit</label>
                            <div class="control">
                                <select name="unit" id="" style="margin-left:20px;">
                                  <option value=""> Unit</option>
                                  @foreach ($units as $unit )
                                      
                                  <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="" class="control-label">Select Size</label>
                            <div class="control">
                                <select name="size" id="" style="margin-left:20px;">
                                  <option value=""> Size</option>
                                  @foreach ($sizes as $size )
                                      
                                  <option value="{{ $size->id }}">{{ $size->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="" class="control-label">Select Color</label>
                            <div class="control">
                                <select name="color" id="" style="margin-left:20px;">
                                  <option value=""> Color</option>
                                  @foreach ($colors as $color )
                                      
                                  <option value="{{ $color->id }}">{{ $color->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        

                       


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="discription" rows="3" required></textarea>
                            </div>

                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="price" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">File Upload</label>
                            <div class="controls">
                                <input type="file" name="file[]" multiple>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection