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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit color</h2>

            </div>

            <div class="box-content">
                 @if (session()->has('success'))
                    <div class="alert alert-success"role="alert">
                       {{ session()->get('success') }}
                    </div>
                    
                    @endif
                <form class="form-horizontal" action="{{ route('colors.update',$color->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group" >
                            <label class="control-label" for="date01">color</label>
                            <div class="controls " >
                                <select class="form-control js-example-tags" style="width: 70%" multiple="multiple" name="color[]" value="{{implode(',',json_decode($color->color))}}" >
                                   
                                </select>
                                {{-- <input type="text" class="input-xlarge" name="size" id="input" data-role="tagsinput" required> --}}
                            </div>
                       </div>


                        

                        


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Color Update </button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection