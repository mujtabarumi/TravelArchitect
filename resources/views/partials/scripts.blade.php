@if(isset($scripts) && !blank($scripts))
    @foreach($scripts as $script)
        <script src="{{ $script }}"></script>
    @endforeach
@endif
@stack('pre-scripts')
{{--<!-- GetButton.io widget -->--}}
{{--<script type="text/javascript">--}}
{{--    (function () {--}}
{{--        var options = {--}}
{{--            facebook: "123516397846973", // Facebook page ID--}}
{{--            call_to_action: "Message us", // Call to action--}}
{{--            position: "right", // Position may be 'right' or 'left'--}}
{{--        };--}}
{{--        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;--}}
{{--        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';--}}
{{--        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };--}}
{{--        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);--}}
{{--    })();--}}
{{--</script>--}}
{{--<!-- /GetButton.io widget -->--}}
<!-- Load Scripts -->
<script src="{{asset("/assets/js/respond.js")}}"></script>
<script src="{{asset("/assets/js/jquery.js")}}"></script>
<script src="{{asset("/assets/plugins/owl.carousel.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/jquery-ui.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap-select.min.js")}}"></script>
<script src="{{asset("/assets/plugins/wow.min.js")}}"></script>
<script type="text/javascript" src="{{asset("/assets/plugins/supersized.3.1.3.min.js")}}"></script>
<script src="{{asset("/assets/js/js.js")}}"></script>

@stack('scripts')


