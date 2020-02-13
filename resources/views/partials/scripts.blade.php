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

<!-- GetButton.io widget -->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v6.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="123516397846973">
</div>


<!-- Load Scripts -->

<script type="text/javascript">
    // (function () {
    //     var options = {
    //         facebook: "123516397846973", // Facebook page ID
    //         call_to_action: "Message us", // Call to action
    //         position: "right", // Position may be 'right' or 'left'
    //     };
    //     var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
    //     var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
    //     s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
    //     var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    // })();

    /* select 2  for single and get data from route */
    function addSelect2Ajax($element, $url, $changeCallback, data) {
        var placeHolder = $($element).data('placeholder');

        if (typeof $changeCallback == 'function') {
            $($element).change($changeCallback)
        }

        return $($element).select2({
            ...data,
            placeholder: placeHolder,
            ajax: {
                url: $url,
                data: function (params) {
                    return {
                        keyword: params.term,
                    }
                },
                processResults: function (data) {

                    return {
                        results: $.map(data, function (obj, index) {
                            return {id: obj.id, text: obj.name};
                        })
                    };
                }
            }
        });

    }
</script>
<!-- /GetButton.io widget -->

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@stack('scripts')


