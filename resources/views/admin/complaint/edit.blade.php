@extends('layouts.admin')
@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h2 class="title">Edit complaint</h2>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/complaint/'.$complaint->id, 'files' => true)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <h3 class="text-center">Basic Info</h3>
                            <input name="company_id" hidden value="{{ $complaint->company_id }}">
                            <input name="customer_id" hidden value="{{ $complaint->customer_id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Incident <star>*</star></label>
                                        <div class='input-group date' id='incident_date'>
                                            <input type='text' name='incident_date' class="form-control"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                              </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zipcode <star>*</star></label>
                                        <input type='number' name='zipcode' class="form-control" value="{{ $complaint->zipcode }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="padding-top:30px">
                                    <center><h5>Company</h5><img src="{{ asset('storage/avatars/'.$complaint->company->avatar) }}" style="width:150px"></center>
                                    <div class="row">
                                        <div class="col-xs-4 text-right">Email:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->user->email }}</div>
                                        <div class="col-xs-4 text-right">Company:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->company_name }}</div>
                                        <div class="col-xs-4 text-right">FullName:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->user->fullname() }}</div>
                                        <div class="col-xs-4 text-right" style="background-color: lightblue">Category:</div>
                                        <div class="col-xs-8 text-left" style="background-color: lightblue"><strong style="color: #3e79ff">{{ $complaint->category()->category }}</strong></div>
                                        <div class="col-xs-4 text-right">Gender:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->gender }}</div>
                                        <div class="col-xs-4 text-right">Phone:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->phone }}</div>
                                        <div class="col-xs-4 text-right">Address:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->company->address }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-top:30px">
                                    <center><h5>Customer</h5><img src="{{ asset('storage/avatars/'.$complaint->customer->avatar) }}" style="width:150px"></center>
                                    <div class="row">
                                        <div class="col-xs-4 text-right">Email:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->customer->user->email }}</div>
                                        <div class="col-xs-4 text-right">FullName:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->customer->user->fullname() }}</div>
                                        <div class="col-xs-4 text-right">Gender:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->customer->gender }}</div>
                                        <div class="col-xs-4 text-right">Phone:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->customer->phone }}</div>
                                        <div class="col-xs-4 text-right">Address:</div>
                                        <div class="col-xs-8 text-left">{{ $complaint->customer->address }}</div>
                                    </div>
                                </div>
                            </div><br/>
                            <hr/>

                            <h3 class="text-center">Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    @unless($complaint->detail)
                                    @else
                                        @foreach(json_decode($complaint->detail) as $key=>$value)
                                        <label>{{ ucfirst($key) }} <star>*</star></label>
                                        <input type='text' name='detail[{{ $key }}]' class="form-control input-group" value="{{ $value }}"/>
                                        @endforeach
                                    @endunless
                                </div>
                            </div> <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Amount owed (USD)<star>*</star></label>
                                    <input type='number' step="0.1" name='amount' class="form-control" value="{{ $complaint->amount }}"/>
                                </div><div class="clearfix"></div> <br/>
                                <div class="col-md-6">
                                    <label>Date rented <star>*</star></label>
                                    <div class='input-group date' id='pickup_date'>
                                        <input type='text' name='pickup_date' class="form-control"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Return Date <star>*</star></label>
                                    <div class='input-group date' id='return_date'>
                                        <input type='text' name='return_date' class="form-control"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Description of Incident <star>*</star></label>
                                    <textarea name='description' rows="5" class="form-control" style="margin-bottom: 15px">{{ $complaint->description }}</textarea>
                                </div> <br/>
                                <div class="col-md-12">
                                    <label>Incident Types <star>*</star></label>
                                    <div class="input-group" style="padding-top: 15px; padding-bottom: 15px">
                                    @foreach($complaint->category()->scoreByIncident() as $item)
                                    <nobr>
                                        <input id="check{{ $loop->index }}" type="checkbox" name="incident_types[]" value="{{ $item->incident_id }}" {{ in_array($item->incident_id, json_decode($complaint->incident_types))? "checked": "" }}/>
                                        <label for="check{{ $loop->index }}" style="font-weight:normal; margin-bottom:15px; margin-right:15px; margin-left:5px">{{ ucfirst(\App\Incident::find($item->incident_id)->incident)." ( ".$item->score." ) " }}</label>
                                    </nobr>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <h3 class="text-center">Header Media</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Media Type <star>*</star></label>
                                    <div class="input-group" style="padding-top: 15px;">
                                        @foreach(['background', 'carousel', 'video', 'none'] as $item)
                                            <nobr>
                                                <input id="radio{{ $loop->index }}" type="radio" name="media_type" value="{{ $item }}" {{ $complaint->media_type==$item? "checked": "" }}>
                                                <label for="radio{{ $loop->index }}" style="font-weight:normal; margin-bottom:15px; margin-right:15px; margin-left:5px">{{ ucfirst($item) }}</label>
                                            </nobr>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6" id="path_input_div" {{ $complaint->media_type=='none'? "hidden": "" }}>
                                    <label>File(s)</label>
                                    <input id="filepath" type="file" onchange="readURL(this);" class="form-control" {{ $complaint->media_type=='carousel'? "multiple": "" }} name="paths[]">
                                </div>
                                <div class="col-md-6" id="url_input_div" {{ $complaint->media_type!='video' && $complaint->media_type=='none'? "hidden": "" }}>
                                    <label>URL of video</label>
                                    <input id="url" type="url" class="form-control" name="url">
                                </div>
                                <div class="col-md-12">
                                    <div class="media_preview">
                                        @foreach(json_decode($complaint->pathOrUrl) as $item)
                                            <img id="blah" src="{{ $item->type=='path'? asset("storage/complaints/".$item->src): $item->src }}" style="width:30%; padding:1.6%">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                                    {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>Number of videos <star>*</star></label>--}}
                                        {{--<Input type="number" name="video" class="form-control" value="{{ $complaint->video }}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>Length of Video (second)<star>*</star></label>--}}
                                        {{--<Input type="number" name="video_length" step=5 class="form-control" value="{{ $complaint->video_length }}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-top:30px">Update complaint</button>
                                <a class="btn btn-danger btn-fill btn-wd" href={{ url('admin/complaint') }} style="margin-top:30px">Back</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

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
        function readURL(input) {
            if (input.files && input.files[0]) {
                for(let index=0; index<input.files.length; index++){
                    if (!input.files[index].type.match('image'))
                        continue;
                    var reader = new FileReader();
                    $(".media_preview").html("");
                    reader.onload = function (e) {
                        $('.media_preview').append(
                            '<img id="blah" src="'+ e.target.result +'" style="width:30%; box-shadow: 2px 2px 4px #737373; margin:1.6%">'
                        )
                    };
                    reader.readAsDataURL(input.files[index]);
                }

            }
        }

        $().ready(function () {
            $("#incident_date").datetimepicker({date: "{{ $complaint->incident_date }}"});
            $("#pickup_date").datetimepicker({date: "{{ $complaint->pickup_date }}"});
            $("#return_date").datetimepicker({date: "{{ $complaint->return_date }}"});
            $("input[name='media_type']").change(function () {
                var type = $(this).val();
                var pathInput = $("#filepath");
                var urlInput = $("#url");
                switch (type) {
                    case 'none':
                        $(".media_preview").html("");
                        $("#path_input_div").hide()
                        $("#url_input_div").hide();
                        break;
                    case 'background':
                        $(".media_preview").html("");
                        $(pathInput).val("");
                        $(pathInput).attr('multiple', false);
                        $("#path_input_div").show()
                        $("#url_input_div").hide();
                        break;
                    case 'carousel':
                        $(".media_preview").html("");
                        $(pathInput).val("");
                        $(pathInput).attr('multiple', true);
                        $("#path_input_div").show()
                        $("#url_input_div").hide();
                        break;
                    case 'video':
                        $(".media_preview").html("");
                        $(pathInput).val("");
                        $(pathInput).attr('multiple', false);
                        $("#path_input_div").show()
                        $("#url_input_div").show();
                        break;
                }
            });

            var $validator = $("#complaint-add-form").validate({
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

