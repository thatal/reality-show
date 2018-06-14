        @if(\Session::has('success'))
            <div class="container">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><i class="fa fa-check"></i></strong>  {!!\Session::get('success')!!}
                </div>
            </div>
        @endif
        @if(\Session::has('error'))
            <div class="container">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><i class="fa fa-exclamation-circle"></i></strong> {!!\Session::get('error')!!}
                </div>
            </div>
        @endif
        @if(\Session::has('warning'))
            <div class="container">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><i class="fa fa-bolt"></i></strong> {!!\Session::get('warning')!!}
                </div>
            </div>
        @endif