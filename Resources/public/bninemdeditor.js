// bninemdeditor.js

// Inject CSS
const cssLink = document.createElement('link');
cssLink.rel = 'stylesheet';
cssLink.href = '/bundles/bninemdeditor/easymde.min.css';
document.head.appendChild(cssLink);

// Inject JS
const script = document.createElement('script');
script.src = '/bundles/bninemdeditor/easymde.min.js';
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
