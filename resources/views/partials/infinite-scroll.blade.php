@section('extra-js')
    <script src="{{ asset('js/vendor/jquery.jscroll-2.4.1.min.js') }}"></script>

    <script type="text/javascript">
        $('ul.pagination').hide();
        var options = {
            autoTrigger: true,
            loadingHtml: '<img class="center-image" src="https://files.aninewstage.org/file/ans-assets/assets/post-loader.gif" alt="Loading..." style="width:150px;height:150px;"/>', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
                $('div.ads-div').remove();
            }
        };
        $('.infinite-scroll').jscroll(options);
    </script>
@endsection
