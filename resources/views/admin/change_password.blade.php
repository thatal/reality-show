@extends('admin/layouts/admin')
@section('title')
Change Password
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="span12">
                    <div class="widget widget-nopad">
                        <div class="widget-header"> <i class="icon-key"></i>
                            <h3> Change Password </h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div class="span3">
                                        {!!Form::open(['url' => route('admin.change_pass.post'), 'class' => 'form-horizontal', 'id' => 'form-validator'])!!}
                                        <fieldset>
                                            <br><br>
                                            @if (\Session::has('message'))
                                                <div class="alert {!!\Session::get('alert')!!}">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{!!\Session::get('message')!!}</strong> 
                                                </div>
                                            @endif
                                            <div class="control-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                {!!Form::label('old_password','Currnent Password',['class'=>'control-label'])!!}
                                                <div class="controls">
                                                    {!!Form::password('old_password', ['class' => 'span4 form-control input-sm', 'placeholder' => 'Current password','required' => true])!!}
                                                     <p class="help-block with-errors">@if($errors->has('old_password')) {!!$errors->first('old_password')!!}@endif</p>
                                                </div>
                                            </div>
                                            <div class="control-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                                                {!!Form::label('new_password','New Password',['class'=>'control-label'])!!}
                                                <div class="controls">
                                                    {!!Form::password('new_password', ['class' => 'span4 form-control input-sm', 'placeholder' => 'New Password','required' => true])!!}
                                                     <p class="help-block with-errors">@if($errors->has('new_password')) {!!$errors->first('new_password')!!}@endif</p>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                {!!Form::label('new_password_confirm','Confirm Password',['class'=>'control-label'])!!}
                                                <div class="controls {{ $errors->has('new_password_confirm') ? ' has-error' : '' }}">
                                                    {!!Form::password('new_password_confirmation', ['class' => 'span4 form-control input-sm', 'placeholder' => 'Confirm Password','required' => true])!!}
                                                     <p class="help-block with-errors">@if($errors->has('new_password_confirmation')) {!!$errors->first('new_password_confirmation')!!}@endif</p>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button class="btn btn-info"><i class="icon-key"></i> Change Password</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                        {!!Form::close()!!}  
                                    </div>                    
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@stop
@section('page_js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#form-validator').validator();
    });
</script>
@stop