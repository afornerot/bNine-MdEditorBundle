// bninemdeditor.js

// Dynamically inject EasyMDE CSS
const cssLink = document.createElement('link');
cssLink.rel = 'stylesheet';
cssLink.href = '/bundles/bninemdeditor/easymde.min.css';
document.head.appendChild(cssLink);

// Dynamically inject EasyMDE JS
const script = document.createElement('script');
script.src = '/bundles/bninemdeditor/easymde.min.js';
script.onload = function () {
    document.querySelectorAll('.easymde-textarea').forEach(function (textarea, index) {
        new EasyMDE({
            element: textarea,
            spellChecker: false,
            status: false,
            autosave: {
                enabled: false,
                uniqueId: "markdownEditor_" + index,
                delay: 1000,
            }
        });
    });
};
document.head.appendChild(script);
