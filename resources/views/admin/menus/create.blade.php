@extends('admin.layout')
@section('css')
<style>
    .invalid-feedback{
      display: block;
   }
</style>
@endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">ADD YOUR MENUS
        </h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Menus</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header bg-info">
                <h4 class="mb-0 text-white" >Create Menu</h4>
            </header>
            <div class="card-body">
                <form method="post" action="{{URL::to('admin/menus/store')}}" >
                    @csrf

                    <div class="form-group">
                        <label class="form-label" >Title</label>
                        <input required type="text" value="{{old('title')}}" name="title" class="form-control " 
                        placeholder="Title">
                        @if($errors->has('title'))
                         <p class="invalid-feedback" >{{ $errors->first('title') }}</p>
                        @endif 
                    </div>

                      <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_enable" >
                            <option {{old('is_enable') ==  '1' ? 'selected' : ''}} value="1">Approve</option>
                            <option {{old('is_enable') ==  '0' ? 'selected' : ''}} value="0">Pending</option>
                        </select>
                        @if($errors->has('is_enable'))
                        <p class="invalid-feedback" >{{ $errors->first('is_enable') }}</p>
                        @endif 
                      </div>

                    <div class="form-group row">
                        <div class="col-md-12 text-left">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                     </div>

                </form>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')

<script>


</script>
    
@endsection