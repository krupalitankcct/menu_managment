@extends('menu::app')
@section('content')
<form class="form-horizontal" action="{{ route('menu.item.store') }}" method="post">
    {{ csrf_field() }}
    <div class="card menu-margin">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{__('package_lang::validation.custom.Menu_item_header')}} 
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            @include('menu::messages')
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
        </div><!--card-body-->
    </div><!--card-->
    <div class="card-footer">
        <div class="row">
           <div class="col-sm-6">
                <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
            </div><!--col-->
            <div class="col-sm-6 text-right">
                <button class="btn btn-info">submit</button>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->

</form>
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
