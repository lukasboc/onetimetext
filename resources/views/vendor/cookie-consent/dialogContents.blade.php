<div class="js-cookie-consent cookie-consent bg-base-200 border-t border-base-300 shadow-lg px-4 py-3"
     style="position:fixed;bottom:0;left:0;right:0;z-index:50;display:flex;align-items:center;justify-content:space-between;gap:1rem;">
    <span class="cookie-consent__message text-sm text-base-content/80">
        {!! trans('cookie-consent::texts.message') !!}
    </span>
    <button class="js-cookie-consent-agree cookie-consent__agree btn btn-sm btn-primary shrink-0">
        {{ trans('cookie-consent::texts.agree') }}
    </button>
</div>
