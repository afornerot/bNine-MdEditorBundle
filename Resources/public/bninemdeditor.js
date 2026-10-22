// bninemdeditor.js
(function () {
    const currentScript = document.currentScript
        || document.querySelector('script[src$="bninemdeditor.js"]');
    const baseUrl = currentScript
        ? new URL('.', currentScript.src)
        : new URL('bundles/bninemdeditor/', document.baseURI);

    // Inject CSS
    const cssLink = document.createElement('link');
    cssLink.rel = 'stylesheet';
    cssLink.href = new URL('easymde.min.css', baseUrl).href;
    document.head.appendChild(cssLink);

    // Inject JS
    const script = document.createElement('script');
    script.src = new URL('easymde.min.js', baseUrl).href;
    script.onload = function () {
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
    document.head.appendChild(script);
})();
