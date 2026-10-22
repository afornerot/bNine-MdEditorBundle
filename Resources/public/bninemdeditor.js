// bninemdeditor.js
(function () {
    const currentScript = document.currentScript
        || document.querySelector('script[src$="bninemdeditor.js"]');
    const baseUrl = currentScript
        ? new URL('.', currentScript.src)
        : new URL('bundles/bninemdeditor/', document.baseURI);
    const cssUrl = currentScript && currentScript.dataset.css
        ? currentScript.dataset.css
        : new URL('easymde.min.css', baseUrl).href;
    const jsUrl = currentScript && currentScript.dataset.js
        ? currentScript.dataset.js
        : new URL('easymde.min.js', baseUrl).href;

    // Inject CSS
    const cssLink = document.createElement('link');
    cssLink.rel = 'stylesheet';
    cssLink.href = cssUrl;
    document.head.appendChild(cssLink);

    // Inject JS
    const script = document.createElement('script');
    script.src = jsUrl;
    script.onload = function () {
        const init = function () {
            document.querySelectorAll('.easymde-textarea').forEach(function (textarea, index) {
                const height = textarea.dataset.markdownHeight;

                new EasyMDE({
                    element: textarea,
                    spellChecker: false,
                    status: false,
                    minHeight: height ? `${height}px` : undefined,
                    autosave: {
                        enabled: false,
                        uniqueId: "markdownEditor_" + index,
                        delay: 1000,
                    }
                });
            });
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
    };
    document.head.appendChild(script);
})();
