@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('package_lang::menu.custom.Menu_header')}}
                    </div>
                    
                    <div class="card-body">
                        @include('menu::messages')
                        <form action="{{route('menu.update',$menuPageEdit->id) }}" class="form-horizontal" method="post" >
                            {{ csrf_field() }}
                            <div class="row mt-4">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" class="form-control" placeholder="Title" required autofocus="true" value="{{$menuPageEdit->title}}" />
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Menu Category</label>
                                    <div class="col-md-10">
                                       <select name="menu_category_id" class="form-control" required>
                                            <option value="">Select Menu Category </option>
                                            @foreach($menuCategories as $key => $menuCategorie)
                                                @if($menuPageEdit->menu_category_id == $key)
                                                    <option value="{{$key}}" selected>{{$menuCategorie}} </option>
                                                @else
                                                    <option value="{{$key}}">{{$menuCategorie}} </option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">Status</label>
                                    <div class="col-md-10">
                                        <select name="status" class="form-control" required>
                                            <option value="">Select Menu Status</option>
                                            <option value="Active" {{ $menuPageEdit->status == 'Active' ? 'selected' : ''}}>Active</option>
                                            <option value="Inactive" {{ $menuPageEdit->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div><!--col-->
                                </div><!--form-group-->
                                <!-- discount status-->
                            </div><!--col-->
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-6">
                                     <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                                </div><!--col-->
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-info">Update</button>
                                </div><!--col-->
                            </div><!--row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
