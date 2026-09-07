@if(env('SENTRY_LARAVEL_DSN'))
<script src="https://js.sentry-cdn.com/YOUR_DSN_HASH_HERE.min.js" crossorigin="anonymous"></script>
<!-- Alternatively, using the browser CDN bundle directly: -->
<script src="https://browser.sentry-cdn.com/7.73.0/bundle.min.js" crossorigin="anonymous"></script>
<script>
  Sentry.init({
    dsn: "{{ env('SENTRY_LARAVEL_DSN') }}",
    integrations: [
      new Sentry.BrowserTracing(),
      new Sentry.Replay(),
    ],
    tracesSampleRate: 1.0,
    replaysSessionSampleRate: 0.1,
    replaysOnErrorSampleRate: 1.0,
  });
</script>
@endif
