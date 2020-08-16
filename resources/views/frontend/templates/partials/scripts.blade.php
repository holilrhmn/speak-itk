<!-- jQuery -->
<script src="{{ asset('landing-page/js/jquery-2.1.0.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('landing-page/js/popper.js') }}"></script>
<script src="{{ asset('landing-page/js/bootstrap.min.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('landing-page/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('landing-page/js/waypoints.min.js') }}"></script>
<script src="{{ asset('landing-page/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('landing-page/js/imgfix.min.js') }}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Global Init -->
<script src="{{ asset('landing-page/js/custom.js') }}"></script>
{{-- <script src="https://cdn.tiny.cloud/1/w205rrnxn3lp2crzvirc7arkyhwwpbpuyxwrwgkq20m5bh02/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
</script> --}}

<!--- Notify-->
<script src="{{ asset('assets/plugins/bs-notify.min.js')}}"></script>
<!---Cactcha-->
{!! NoCaptcha::renderJs() !!}
{!! NoCaptcha::renderJs('fr', true, 'recaptchaCallback') !!}
<!---Select 2 -->


