@extends('layouts.admin')
@section('styles')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit membership</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/membership/'.$membership->id)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Membership Name <star>*</star></label>
                                        <input type="text" name="name" class="form-control border-input"
                                               placeholder="Ex: AC Night Bus" value="{{ $membership->name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price <star>*</star></label>
                                        <Input type="number" name="price" step="0.1" class="form-control" value="{{ $membership->price }}">
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of states <star>*</star></label>
                                        <Input type="number" name="state" class="form-control" value="{{ $membership->state }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of searches <star>*</star></label>
                                        <Input type="number" name="search" class="form-control" value="{{ $membership->search }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of Records <star>*</star></label>
                                        <Input type="number" name="record" class="form-control" value="{{ $membership->record }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of images <star>*</star></label>
                                        <Input type="number" name="image" class="form-control" value="{{ $membership->image }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of videos <star>*</star></label>
                                        <Input type="number" name="video" class="form-control" value="{{ $membership->video }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Length of Video (second)<star>*</star></label>
                                        <Input type="number" name="video_length" step=5 class="form-control" value="{{ $membership->video_length }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update membership</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!--  Forms Validations Plugin -->
    <script src="{{asset("backend/js/jquery.validate.min.js")}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{asset('/backend/js/bootstrap-datetimepicker.js')}}"></script>
    <script>
        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    </script>

    <script>
        $().ready(function () {

            var $validator = $("#membership-add-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    description: {
                        maxlength: 200
                    },
                    gender: {
                        required: true
                    }
                }
            });
        });
    </script>
@endsection

