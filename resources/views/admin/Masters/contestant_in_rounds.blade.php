@extends('admin/layouts/ace')
@section('title')
Add Contestant to Rounds
@stop
@section('css_page')
<link rel="stylesheet" href="{{asset('web-assets/css/lity.min.css')}}">
<style type="text/css">
    .chosen-container-single .chosen-single {
        height: 32px;
        line-height: 29px;
        border-radius: 0px; 
    }
</style>
@stop
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Rounds
                </small>
            </h1>
        </div>
        @include('admin/include/alert')
        <?php 

            $create  = "";
            $view    = "";
            if (Session::has('active')) {
                $view    = "active";
            }else{
                $create  = "active";
            }
        ?>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                            <li class="{{$create}}">
                                <a data-toggle="tab" href="#home4" aria-expanded="true"><i class="orange ace-icon fa fa-pencil-square-o bigger-120"></i> Create</a>
                            </li>

                            <li class="{{$view}}">
                                <a data-toggle="tab" href="#profile4" aria-expanded="false"><i class="green ace-icon fa fa-eye bigger-120"></i> View</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home4" class="tab-pane {{$create}}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!!Form::open(['url' => route('admin.contestant_rounds.save'), 'class' => "form-horizontal form-validator",'files' => true,'id' =>'form1'])!!}
                                            <div class="form-group row {{ $errors->has('show_round_id') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('round_name', 'Select Round Name <span class="text-danger">*</span>', ['class' => 'control-label col-sm-4']))!!}
                                                <div class="col-sm-8">
                                                    {!!Form::select('show_round_id',$round_list,null,['class' => 'form-control', 'data-error' => 'Please Select atleat one Round Name.', 'required' => true, 'empty' => '--SELECT--'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('show_round_id')) {{$errors->first('show_round_id')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('artist_master_id') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('artist_master_id', 'Select Contestant <span class="text-danger">*</span>', ['class' => 'control-label col-sm-4']))!!}
                                                <div class="col-sm-8">
                                                    {!!Form::select('artist_master_id',$list, null,['class' => ' chosen-select form-control', 'data-error' => 'Please Select atleast one Contestant.', 'required' => true, 'empty' => '--SELECT--', 'data-placeholder'=>"Choose Contestant",'id' => 'form-field-select-3'])!!}
                                                    <div class="help-block with-errors">@if($errors->has('artist_master_id')) {{$errors->first('artist_master_id')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!!Html::decode(Form::label('artist_image', 'Image <span class="text-danger">*</span><br><span class="text-danger">250x270</span>', ['class' => 'control-label col-sm-4']))!!}
                                                <div class="col-sm-8">
                                                    {!!Form::file('artist_image',['class' => 'ac-file-input','accept' => 'image/x-png,image/gif,image/jpeg,image/jpg', ])!!}
                                                    <div class="help-block with-errors">@if($errors->has('artist_image')) {{$errors->first('artist_image')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!!Html::decode(Form::label('youtube_id', 'Youtube Video Code <span class="text-danger">*</span>', ['class' => 'control-label col-sm-4']))!!}
                                                <div class="col-sm-8">
                                                    {!!Form::text('youtube_id', null, ['class' => 'form-control','placeholder' => 'Youtube Video id', 'required' => true, 'data-error' => 'Youtube video id is required.'])!!}
                                                    <div class="bg-info"><strong>https://www.youtube.com/watch?v=<kbd>your code</kbd></strong></div>
                                                    <div class="help-block with-errors">@if($errors->has('youtube_id')) {{$errors->first('youtube_id')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                                {!!Html::decode(Form::label('status', 'Status <span class="text-danger">*</span>', ['class' => 'control-label col-sm-4']))!!}
                                                <div class="col-sm-8">
                                                    {!!Form::select('status',['active' =>'Active','not_active' =>'Not Active'],'active',['class' => 'form-control', 'data-error' => 'Please Select one status.', 'required' => true])!!}
                                                    <div class="help-block with-errors">@if($errors->has('status')) {{$errors->first('status')}} @endif</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-offset-3">
                                                    {!!Form::button('<i class="fa fa-send"></i> Submit', [
                                                        'type' => 'submit',
                                                        'class'=> 'btn btn-success btn-sm',
                                                    ]);!!}
                                                </div>
                                            </div>
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>

                            <div id="profile4" class="tab-pane {{$view}}">
                                <h3>Contestant in Round Details</h3>
                                <hr>
                                {!!Form::open(['url' => route('admin.send_cont'), 'class' =>'form-validator','id' => 'change_round_form'])!!}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-condensed table-hover data_table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label>
                                                    <input type="checkbox" name="all" class="ace ace-checkbox-2" onClick="CheckedDetails(this)">
                                                    <span class="lbl"></span>
                                                </label>
                                                </th>
                                                <th>Sl. No.</th>
                                                <th>Round Name</th>
                                                <th>Contestant Name</th>
                                                <th>Image</th>
                                                <th>Youtube</th>
                                                <th>status</th>
                                                <th>Change Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="checkbox_ids">
                                            @if (sizeof($all_contestant_in_rounds))
                                                @foreach ($all_contestant_in_rounds as $key => $value)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                            <input type="checkbox" name="ids[]" class="ace" value="{{Crypt::encrypt($value->artist->id)}}">
                                                            <span class="lbl"></span>
                                                        </label>
                                                        </td>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$value->round->name}}</td>
                                                        <td>{{$value->artist->name}}</td>
                                                        <td><a href="{{$artist_image_dir.$value->artist_image}}" data-lity><img src="{{$artist_image_dir.$value->artist_image}}" width="7%"></a><a href="{{route('admin.change.img.tube', Crypt::encrypt($value->id))}}" target="_blank"><button type="button" class="btn btn-xs btn-warning pull-right"> Change Image</button></td>
                                                        <td>{{$value->youtube_id}} <a href="//www.youtube.com/watch?v={{$value->youtube_id}}" data-lity ><button type="button" class="btn btn-xs btn-info pull-right" data-toggle="tooltip" title="View Video"><i class="fa fa-eye"></i></button></a></td>
                                                        <td><label class="label label-{{$value->status == 'active' ? 'success' : 'inverse'}}">{{str_replace('_', ' ', $value->status)}}</label></td>

                                                        <td><a href="{{route('round.change.status', Crypt::encrypt($value->id))}}" class="btn btn-info btn-xs" onClick="return confirm('Are you sure ? Change Status.')"><i class="glyphicon glyphicon-refresh"></i> Change Status</a></td>
                                                        
                                                    </tr>
                                                @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6" colspan="bg-danger">No Records Found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            {!!Html::decode(Form::label('round','<strong>Select Round</strong>',['control-label']))!!}
                                            {!!Form::select('round',$round_list, null, ['class' => 'form-control'])!!}
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-send"></i> Send To Round</button>
                                        </div>
                                    </div>
                                </div>
                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        <div class="modal fade" id="updateImages">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Image/Youtube Link</h4>
                    </div>
                    {!!Form::open(['url' => '', 'files' => true])!!}
                    <div class="modal-body">
                        <div class="form-group row">
                            {!!Html::decode(Form::label('artist_image', 'Image <span class="text-danger">*</span><br><span class="text-danger">250x270</span>', ['class' => 'control-label col-sm-4']))!!}
                            <div class="col-sm-8">
                                {!!Form::file('artist_image',['class' => 'ac-file-input','accept' => 'image/x-png,image/gif,image/jpeg,image/jpg', ])!!}
                                <div class="help-block with-errors">@if($errors->has('artist_image')) {{$errors->first('artist_image')}} @endif</div>
                                <input type="hidden" name="id" value="" id="inputValue">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            {!!Html::decode(Form::label('youtube_id', 'Youtube Video Code <span class="text-danger">*</span>', ['class' => 'control-label col-sm-4']))!!}
                            <div class="col-sm-8">
                                {!!Form::text('youtube_id', null, ['class' => 'form-control','placeholder' => 'Youtube Video id', 'data-error' => 'Youtube video id is required.'])!!}
                                <div class="bg-info"><strong>https://www.youtube.com/watch?v=<kbd>your code</kbd></strong></div>
                                <div class="help-block with-errors">@if($errors->has('youtube_id')) {{$errors->first('youtube_id')}} @endif</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save changes</button>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
@stop
@section('js_page')
<script src="{{asset('web-assets/js/lity.min.js')}}"></script>
<script type="text/javascript">
    image_validation = true;
    $(document).ready(function(){
        console.log("Ready");
        $('#change_round_form').submit(function() {
            var count_num = $('input[name^="ids"]:checked').length;
            if (count_num == 0) {
                alert("Please Select atleaset one contestant to send.");
                return false;
            }
        });
    });
    $('.ac-file-input').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:true,
        onchange: null,
        thumbnail:'large', //| true | large
        whitelist:'gif|png|jpg|jpeg',
        blacklist:'exe|php|bmp',
        onchange: function(Obj){
            console.log(this);
        }
        
    });
    $('.ac-file-input').on('change', function(){
        var $obj =  this;
        var file  = this.files[0];
        var img = new Image();

        img.onload = function() {
            console.log(this.width);
            var sizes = {
                width:this.width,
                height: this.height
            };
            var width   = this.width;
            var height  = this.height;
            if (width != 250 || height != 270) {
                alert("Image size must be 250 X 270");
                // $($obj).val('');
                image_validation = false;
                return false;
            }else{
                image_validation = true;
            }
            URL.revokeObjectURL(this.src);

            console.log('onload: sizes', sizes);
            console.log('onload: this', this);
        }

        var objectURL = URL.createObjectURL(file);

        console.log('change: file', file);
        console.log('change: objectURL', objectURL);
        img.src = objectURL;
    });
    $('#form1').submit(function(event) {
        if (image_validation == false) {
            alert("Image Size must be 250 x 270");
            return false;
        }
    });
    CheckedDetails = function(Obj){
        console.log(Obj);
        if($(Obj).is(':checked')){
            // console.log('checked');
            $('#checkbox_ids').find('input[type="checkbox"]').prop('checked', true);
        }else{
            $('#checkbox_ids').find('input[type="checkbox"]').prop('checked', false);
        }
        // var all_checkbox = $('#checkbox_ids').find('input[type="checkbox"]');
        // console.log(all_checkbox);
    }
    ChangeImage = function(Obj){
        console.log(Obj);
        $this = $(Obj);
        $('#updateImages').modal();
        console.log($this.attr('sun-data-id'));
        $('#updateImages').find('input').val('');
        $('#updateImages').find('#inputValue').val($this.attr('sun-data-id'));
    }
</script>
    
@stop