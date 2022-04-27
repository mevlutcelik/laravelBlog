<script>
    setTimeout(alertHide, 1500);
    function alertHide() {
        document.querySelector("#alert-message").style.display = "none";
    }
</script>
<p id="alert-message" class="alert alert-{{ Session::get('type') }}">{{ Session::get('msg') }}</p>
