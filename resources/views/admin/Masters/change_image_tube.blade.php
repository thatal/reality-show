@extends('admin/layouts/ace')
@section('title')
Edit Contestant Image and Youtube Link
@stop
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Contestant
                </small>
            </h1>
        </div>
        @include('admin/include/alert')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                            <li class="active">
                                <a data-toggle="tab" href="#home4" aria-expanded="true"><i class="orange ace-icon fa fa-pencil-square-o bigger-120"></i> Change Image & Youtube Link</a>
                            </li>

                           {{--  <li class="">
                                <a data-toggle="tab" href="#profile4" aria-expanded="false"><i class="green ace-icon fa fa-eye bigger-120"></i> View</a>
                            </li> --}}
                        </ul>

                        <div class="tab-content">
                            <div id="home4" class="tab-pane active">
                                <h3>Update Contestant Details</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!!Form::open([ 'url' => route('admin.change.img.tube.post', Crypt::encrypt($details->id)),'class' => "form-horizontal form-validator",'id' => 'form1', 'files' => true])!!}
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Round Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="" class="form-control" readonly="readonly" value="{{$details->round->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-4">Contstant Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="" class="form-control" readonly="readonly" value="{{$details->artist->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!!Html::decode(Form::label('artist_image', 'Image <br><span class="text-danger">250x270</span>', ['class' => 'control-label col-sm-4']))!!}
                                            <div class="col-sm-8">
                                                {!!Form::file('artist_image',['class' => 'ac-file-input','accept' => 'image/x-png,image/gif,image/jpeg,image/jpg', ])!!}
                                                <div class="help-block with-errors">@if($errors->has('artist_image')) {{$errors->first('artist_image')}} @endif</div>
                                                <input type="hidden" name="id" value="" id="inputValue">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!!Html::decode(Form::label('youtube_id', 'Youtube Video Code', ['class' => 'control-label col-sm-4']))!!}
                                            <div class="col-sm-8">
                                                {!!Form::text('youtube_id', null, ['class' => 'form-control','placeholder' => 'Youtube Video id', 'data-error' => 'Youtube video id is required.'])!!}
                                                <div class="bg-info"><strong>https://www.youtube.com/watch?v=<kbd>your code</kbd></strong></div>
                                                <div class="help-block with-errors">@if($errors->has('youtube_id')) {{$errors->first('youtube_id')}} @endif</div>
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
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        <div class="modal fade" id="editRound">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Round</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('js_page')
<script type="text/javascript">
    image_validation = true;
    $(document).ready(function(){
        console.log("Ready");
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
        // onchange: function(Obj){
        //     console.log(this);
        // }
        
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

        }

        var objectURL = URL.createObjectURL(file);

        img.src = objectURL;
    });
    $('#form1').submit(function(event) {
        var submit_flag = false;
        if (image_validation == false) {
            if ($('.ac-file-input').val() != "") {
                alert("Image Size must be 250 x 270");
                return false;
                
            }
        }
        if ($('.ac-file-input').val() != "") {
            submit_flag = true;            
        }
        if ($('#youtube_id').val() != "") {
            submit_flag = true;            
        }
        
        if (!submit_flag) {
            alert("Please fill any field.");
            return false;
        }
    });
</script>
    
@stop