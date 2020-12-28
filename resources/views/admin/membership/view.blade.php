@extends('layouts.admin')
@section('style')
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
                                {{--<a href="{{url('admin/membership/create')}}" rel="tooltip" title="Add New Incident"--}}
                                   {{--class="btn btn-danger" style="margin-right: 20px">--}}
                                    {{--<i class="ti-plus"></i>--}}
                                {{--</a>--}}
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="name">Name</th>
                                <th data-field="price">Price</th>
                                <th data-field="state">No. of States</th>
                                <th data-field="search">Search</th>
                                <th data-field="image">Image</th>
                                <th data-field="video">Video</th>
                                <th data-field="video_length">Video Length</th>
                                <th data-field="record">Record</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($memberships->count())
                                    @else
                                        @foreach($memberships as $index => $membership)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{ $membership->name }}</td>
                                                <td>{{ "$".$membership->price." / Mon" }}</td>
                                                <td>{{ $membership->state == -1 ? "All": $membership->state }}</td>
                                                <td>{{ $membership->search == -1 ? "Unlimited": $membership->search }}</td>
                                                <td>{{ $membership->image }}</td>
                                                <td>{{ $membership->video }}</td>
                                                <td>{{ $membership->video_length }}</td>
                                                <td>{{ $membership->record }}</td>
                                                <td>
                                                    <div class="table-icons">
                                                        <a rel="tooltip" title="Edit"
                                                           class="btn btn-simple btn-warning btn-icon table-action edit"
                                                           href="{{url('admin/membership/'.$membership->id.'/edit')}}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                        {{--<button rel="tooltip" title="Remove"--}}
                                                                {{--class="btn btn-simple btn-danger btn-icon table-action"--}}
                                                                {{--onclick="delete_button()">--}}
                                                            {{--<i class="ti-close"></i>--}}
                                                        {{--</button>--}}
                                                        {{--<div class="collapse">--}}
                                                            {{--{!! Form::open(array('id' => 'delete-membership', 'url' => 'admin/membership/'.$membership->id)) !!}--}}
                                                            {{--{{ Form::hidden('_method', 'DELETE') }}--}}
                                                            {{--<button type="submit" class="btn btn-danger btn-ok">Delete</button>--}}
                                                            {{--{!! Form::close() !!}--}}
                                                        {{--</div>--}}

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endunless
                                </tbody>
                            </table>
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

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "You want to delete the membership.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-membership').submit();
            });
        }


        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
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

