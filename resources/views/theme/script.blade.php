<!-- JavaScripts ============================================= -->
<script src="{{asset('semicolon/js/jquery.js')}}"></script>
<script src="{{asset('semicolon/js/plugins.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY8xmhot-viwVybAxaOD_Qissx0wCJUcA&callback=initMap&libraries=&v=weekly"></script>
<!-- Footer Scripts ============================================= -->
<script src="{{asset('semicolon/js/functions.js')}}"></script>
<script type="text/javascript">
    $("body").on("contextmenu", "img", function(e) {
        return false;
    });
    $('img').attr('draggable', false);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            load_list(1);
            }
        });
    });
</script>
<script src="{{asset('js/swa2.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/regex.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/routes.js')}}"></script>