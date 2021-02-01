@extends('menu::app')
@section('content')

    <div class="card menu-margin">
        <div class="card-body">
            <x-courier-menu-header message="Menu Management" url="{{route('menu.create')}}"></x-courier-menu-header>
            @include('menu::messages')
            <!-- search box-->
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="name">
                                    Title
                                </th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="type">
                                   Menu Category Name
                                </th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="status">
                                   Status
                                </th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($menus) > 0)
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->title }}</td>
                                     <td>{{ $menu->menuCategory->name }}</td>
                                    <td>{{ $menu->status }}</td>
                                    <td class="btn-td">
                                        <div class='btn-group'>
                                        <a href="{{ route('menu.edit',$menu->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ route('menu.item.index',$menu) }}" data-toggle="tooltip" data-placement="top" title="Menu Items" class="btn btn-success">
                                           Menu Items
                                        </a>
                                        <a href="{{ route('menu.delete',$menu->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" align="center">No Record Found</td>
                                </tr>
                            @endif
                            <tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                </div><!--col-->
            </div>
        </div>
    </div>


@endsection
