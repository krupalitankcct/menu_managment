@extends('menu::layouts.admin-app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('package_lang::menu.custom.Menu_item_header')}}
                    </div>
                    @include('menu::messages')
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('menu.item.store') }}" method="post">
                        {{ csrf_field() }}
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="menu_title" class="form-control" placeholder="Title" required autofocus="true"/>
                                        </div><!--col-->
                                    </div><!--form-group-->

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Menu Type</label>
                                        <div class="col-md-10" >
                                            <select name="menu_types" id="menu_types" class="form-control" >
                                                @foreach($menuTypes as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div><!--col-->
                                    </div><!--form-group-->
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Menu Url</label>
                                        <div class="col-md-10" id='url-section'>
                                            <input type="text" name="menu_url" class="form-control" placeholder="Menu Url" required autofocus="true"/>
                                        </div><!--col-->
                                    </div><!--form-group-->
                                    <!-- sort order -->
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label">Sort Order</label>
                                        <div class="col-md-10">
                                            <input type="number" name="order" class="form-control"  required />
                                        </div><!--col-->
                                    </div>
                                   
                                    <input type="hidden" name="menu_id" value="{{$menus}}">
                                </div><!--col-->
                            </div><!--row-->
                            <div class="row">
                               <div class="col-sm-6">
                                    <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                                </div><!--col-->
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-info">submit</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_types").change(function(){
           var menuType = $(this).val();

            if(menuType == "custom"){
               $("#url-section").html('<input class="form-control" type="text" name="menu_url" id="menu_url" placeholder="Menu Url" maxlength="191" required="" autofocus="">');
            }
            if(menuType == "cms"){
               var cmsDropdown = '<select name="cms_id" id="cms_id" class="form-control" required="">';
                   cmsDropdown +='<option value="">Select Cms Page</option>';
                   @foreach($cms as $key => $value)
                        cmsDropdown += '<option value="{{$key}}">{{$value}}</option>';
                    @endforeach
                    cmsDropdown += '</select>';
                    $("#url-section").html(cmsDropdown);
            }
        });
    });
</script>
@endsection
