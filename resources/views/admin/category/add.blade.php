@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Add Category</h4>
                        </div>
                        <div class="content">
                            {{--{!! Form::open(array('url' => 'admin/category/', 'id' => 'category-add-form')) !!}--}}
                            {{--{{ Form::hidden('_method', 'POST') }}--}}
                            <form action="{{ url('admin/category/store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Category Name<star>*</star></label>
                                            <input type="text" name="category" class="form-control border-input"
                                                   placeholder="Ex: Apartment" value="{{ Input::old('category') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status<star>*</star></label>
                                            <select name="status" id="status" class="form-control">
                                                @foreach(config('var.status1') as $status)
                                                    <option @if(Input::old('status') == $status) selected="selected" @endif value="{{ $status == 'active'? 1: 0 }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row input-incident">
                                    <div class="col-xs-7">
                                        <div class="form-group">
                                            <label>Incidents<star>*</star></label>
                                            <select name="incidents[]" id="status" class="form-control">
                                                @foreach($incidents as $incident)
                                                    <option value="{{ $incident->id }}">{{ $incident->incident }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-sm-4 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Scores<star>*</star></label>
                                            <select name="scores[]" id="status" class="form-control">
                                                <option>0</option>
                                                @for($index = 1; $index<=10; $index++)
                                                    <option>{{ $index }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-fill" onclick="addIncidentForm()">+ Add Incident Type</button>
                                <br>
                                <br>
                                <br>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-info btn-fill btn-wd" value="Add Category"/>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                            {{--{!! Form::close() !!}--}}
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

    <!--  Select Picker Plugin -->
    <script src="{{asset('backend/js/bootstrap-selectpicker.js')}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{asset('/backend/js/bootstrap-datetimepicker.js')}}"></script>
    <script>
        function addIncidentForm() {
            $input_form = '<div class="col-xs-7">\n' +
                '                                        <div class="form-group">\n' +
                '                                            <select name="incidents[]" id="status" class="form-control">\n' +
            '                                                   @foreach($incidents as $incident)\n' +
                '                                                    <option value="{{ $incident->id }}">{{ $incident->incident }}</option>\n' +
                '                                                @endforeach\n' +
                '                                            </select>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                    <div class="col-xs-5 col-sm-4 col-sm-offset-1">\n' +
                '                                        <div class="form-group">\n' +
                '                                            <select name="scores[]" id="status" class="form-control">\n' +
                '                                                <option>0</option>\n' +
                '                                                @for($index = 1; $index<=10; $index++)\n' +
                '                                                    <option>{{ $index }}</option>\n' +
                '                                                @endfor\n' +
                '                                            </select>\n' +
                '                                        </div>\n' +
                '                                    </div>';
            $('.input-incident').append($input_form);
        }

        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    </script>

    <script>
        $().ready(function () {

            var $validator = $("#category-add-form").validate({
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

