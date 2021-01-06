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
                            <h4 class="title">Edit payment_method</h4><br/>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/payment_method/'.$payment_method->id)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Payment Method Name <star>*</star></label>
                                        <input type="text" name="name" class="form-control border-input"
                                               placeholder="Ex: AC Night Bus" value="{{ $payment_method->name }}">
                                    </div>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status <star>*</star></label>
                                        <select name="isActive" id="isActive" class="form-control">
                                            <option value="" disabled selected>- Select IsActive -</option>
                                            <option value="1" @if($payment_method->isActive) selected="selected" @endif>Active</option>
                                            <option value="0" @if(!$payment_method->isActive) selected="selected" @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br/>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update payment_method</button>
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

            var $validator = $("#payment_method-add-form").validate({
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

