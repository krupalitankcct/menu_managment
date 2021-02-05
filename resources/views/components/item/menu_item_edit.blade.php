@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('menu::messages')
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('package_lang::menu.custom.Menu_item_header')}}
                    </div>
                    
                    <div class="card-body">
                       <form class="form-horizontal" action="{{ route('menu.item.update',$menuItemPageEdit->id) }}" method="post">
                        {{ csrf_field() }}
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="menu_title" class="form-control" placeholder="Title" required autofocus="true" value="{{$menuItemPageEdit->menu_title}}" />
                                        </div><!--col-->
                                    </div><!--form-group-->

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Menu Type</label>
                                        <div class="col-md-10" >
                                            <select name="menu_types" id="menu_types" class="form-control" >
                                                @foreach($menuTypes as $key => $value)
                                                    @if($menuItemPageEdit->menu_types == $key)
                                                        <option value="{{$key}}" selected>{{$value}} </option>
                                                    @else
                                                        <option value="{{$key}}">{{$value}} </option>
                                                    @endif
                                                @endforeach  
                                            </select>
                                        </div><!--col-->
                                    </div><!--form-group-->
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Menu Url</label>
                                        <div class="col-md-10" id='url-section'>
                                            <input type="text" name="menu_url" class="form-control" placeholder="Menu Url" required autofocus="true" value="{{$menuItemPageEdit->menu_url}}" />
                                        </div><!--col-->
                                    </div><!--form-group-->
                                    <!-- sort order -->
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Sort Order</label>
                                        <div class="col-md-10">
                                            <input type="number" name="order" class="form-control" value="{{$menuItemPageEdit->order}}" required />
                                        </div><!--col-->
                                    </div>
                                    <input type="hidden" name="menu_id" value="{{$menuItemPageEdit->menu_id}}">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Status</label>
                                        <div class="col-md-10">
                                            <select name="status" class="form-control" required>
                                                <option value="">Select Menu Status</option>
                                                <option value="Active" {{ $menuItemPageEdit->status == 'Active' ? 'selected' : ''}}>Active</option>
                                                <option value="Inactive" {{ $menuItemPageEdit->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div><!--col-->
                                    </div><!--form-group-->

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
