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
                                {{--<a href="{{url('admin/complaint/create')}}" rel="tooltip" title="Add New Incident"--}}
                                   {{--class="btn btn-danger" style="margin-right: 20px">--}}
                                    {{--<i class="ti-plus"></i>--}}
                                {{--</a>--}}
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="sn" class="text-center">S.N.</th>
                                <th data-field="company" data-sortable="true">Company Name</th>
                                <th data-field="customer" data-sortable="true">Customer Name</th>
                                <th data-field="category" data-sortable="true">Category</th>
                                <th data-field="zipcode">Zipcode</th>
                                <th data-field="incident_date" data-sortable="true">IncidentDate</th>
                                <th data-field="rental_score" data-sortable="true">RentalScore</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="actions" class="td-actions text-right">Actions
                                </th>
                                </thead>
                                <tbody>
                                @unless($complaints->count())
                                @else
                                    @foreach($complaints as $index => $complaint)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{ $complaint->company->company_name }}</td>
                                            <td>{{ $complaint->customer->user->fullname() }}</td>
                                            <td>{{ $complaint->category->category }}</td>
                                            <td>{{ $complaint->zipcode }}</td>
                                            <td>{{ $complaint->incident_date }}</td>
                                            <td>{{ $complaint->rentalScore() }}</td>
                                            <td>
                                                @if($complaint->isActive) <button class="btn btn-success btn-xs btn-fill">Active</button>
                                                @else <button class="btn btn-default btn-xs btn-fill">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="table-icons">
                                                    <a rel="tooltip" title="Edit"
                                                       class="btn btn-simple btn-warning btn-icon table-action edit"
                                                       href="{{url('admin/complaint/'.$complaint->id.'/edit')}}">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <button rel="tooltip" title="Remove"
                                                            class="btn btn-simple btn-danger btn-icon table-action"
                                                            onclick="delete_button(this)">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                    <div class="collapse">
                                                        {!! Form::open(array('id' => 'delete-complaint', 'url' => 'admin/complaint/'.$complaint->id)) !!}
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
                            @if(\App\AutoApprove::find(2)->isAuto)
                                <p>If you want to disable auto-approve new complaints please click the following button.</p>
                                <a class="btn btn-danger" href="{{ route('autoApprove', 2) }}">Disable Auto</a>
                            @else
                                <p>If you want to enable auto-approve new complaints please click the following button.</p>
                                <a class="btn btn-success" href="{{ route('autoApprove', 2) }}">Enable Auto</a>
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
                text: "You want to delete the complaint.",
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

