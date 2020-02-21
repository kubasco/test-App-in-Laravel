@if ($errors->any())
    <div class="fadeInDown col-10 errors_modal bg-danger p-4" style="position: absolute;z-index:1000;">
        <div class="user-block block text-center badge-danger">
            <h3>{{ __('auth.fix_errors') }}</h3>
            <hr>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button id="close_errors" class="btn btn-info">{{ __('auth.understand') }}</button>
        </div>
    </div>
    <script>
        window.setTimeout(function () {
            $(".errors_modal").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, {{ $errors->count() * 3000 }});
        $("#close_errors").click(function()
        {
            $(".errors_modal").remove();
        });
    </script>
@endif
