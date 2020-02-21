@if (session('success'))
    <div class="fadeInDown col-10 success_modal bg-success p-4" style="position: absolute;z-index:1000;">
        <div class="user-block block text-center badge-success">
            <h3>{{ __('auth.success') }}</h3>
        </div>
    </div>
    <script>
        window.setTimeout(function () {
            $(".success_modal").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 1500);
    </script>
@endif
