@extends('layouts.admin')
@section('styles')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <div class="toolbar">
                            {{--<a href="{{url('admin/user/administrator/create')}}" rel="tooltip" title="Add New User"--}}
                            {{--class="btn btn-danger" style="margin-right: 20px">--}}
                            {{--<i class="ti-plus"></i>--}}
                            {{--</a>--}}
                            <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="id" class="text-center">User ID</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="phone" data-sortable="true">Phone</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="address" data-sortable="true">Address</th>
                                <th data-field="roles" data-sortable="true">RentalScore</th>
                                <th data-field="isActive" data-sortable="true">isActive</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($users->count())
                                @else
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->detail? $user->detail->first_name." ".$user->detail->last_name: "" }}</td>
                                            <td>{{ $user->detail->phone?? "" }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->detail->address?? "" }}</td>
                                            <td>
                                                {{ $user->detail->rentalScore() }}
                                            </td>
                                            <td>
                                                @if($user->isActive) <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                @else <button class="btn btn-default btn-xs btn-fill">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->detail) <button class="btn btn-success btn-xs btn-fill">Completed</button>
                                                @else <button class="btn btn-default btn-xs btn-fill">Registered</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="table-icons">
                                                    <a rel="tooltip" title="Edit"
                                                       class="btn btn-simple btn-warning btn-icon table-action edit"
                                                       href="{{url('admin/user/customer/'.$user->id.'/edit')}}">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <button rel="tooltip" title="Remove"
                                                            class="btn btn-simple btn-danger btn-icon table-action"
                                                            onclick="delete_button(this)">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                    <div class="collapse">
                                                        {!! Form::open(array('id' => 'delete-user', 'url' => 'admin/user/customer/'.$user->id)) !!}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endunless
                                </tbody>
                            </table>
                        </div>
                        <div class="container" style="padding-bottom: 30px">
                            @if(\App\AutoApprove::find(1)->isAuto)
                                <p>If you want to disable auto-approve new registrations please click the following button.</p>
                                <a class="btn btn-danger" href="{{ route('autoApprove', 1) }}">Disable Auto</a>
                            @else
                                <p>If you want to enable auto-approve new registrations please click the following button.</p>
                                <a class="btn btn-success" href="{{ route('autoApprove', 1) }}">Enable Auto</a>
                            @endif
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">

        var delete_button = function(e){
            swal({  title: "Are you sure?",
                text: "After you delete the user, all user room and events bookings will also be deleted.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                var item = $(e).parent('div').find('form')[0];
                item.submit();
            });
        };

        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                // showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection

