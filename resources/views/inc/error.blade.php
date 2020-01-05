<div class="container">
    @if(session('success'))
        <div class="alert alert-success fade in absolute-msg" >
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            @if(is_array(session('success'))) @foreach(session('success') as $success) {!! $success !!} @endforeach @else {!! session('success') !!} @endif
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger fade in absolute-msg">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <p class="margin-0"><b>The following errors have occurred:</b></p>
            <ul style="padding:0 40px 0;" class="margin-0">
                @foreach ($errors->all() as $error)
                <li style="list-style:disc;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade in absolute-msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            @if(is_array(session('error'))) @foreach(session('error') as $success) {!! $success !!} @endforeach @else {!! session('error') !!} @endif
        </div>
    @endif
</div>
