<div class="row">
    <div class="col-lg-12">
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="alert-success">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <p>{{ $message }}</p>
        </div>
        @endif

        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-styled-left alert-dismissible" id="alert-danger">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <p>{{ $message }}</p>
        </div>
        @endif

        @if($message = Session::get('warning'))
        <div class="alert alert-warning alert-styled-right alert-dismissible" id="alert-warning">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <p>{{ $message }}</p>
        </div>
        @endif

        @if($message = Session::get('info'))
        <div class="alert alert-info alert-styled-right alert-dismissible" id="alert-info">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
</div>
<script>
    $(".alert-success").fadeOut(3000);
    $(".alert-danger").fadeOut(3000);
</script>
