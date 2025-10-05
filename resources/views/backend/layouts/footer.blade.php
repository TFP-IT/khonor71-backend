<!--/.main content-->
<footer class="footer-content d-print-none">
    <div class="footer-text d-flex align-items-center justify-content-between">
        <div class="copy">© {{date('Y')}} {{ app_setting()->footer_text ?? '' }}</div>
        <div class="credit">Designed by: <a href="https://www.versatilo.group" class="text-primary">Versatilo Group</a></div>

        <input type="hidden" id="base_url" value="{{ url('') }}">
    </div>
</footer>
<!--/.footer content-->
