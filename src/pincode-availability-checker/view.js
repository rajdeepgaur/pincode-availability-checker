/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.pincode-checker-block').forEach(block => {
        const input = block.querySelector('.pincode-input');
        const button = block.querySelector('.pincode-submit');
        const message = block.querySelector('.pincode-message');

        // Get cookie
        const saved = getCookie('user_pincode');
        if (saved) input.value = saved;

        button.addEventListener('click', async () => {
            const pincode = input.value.trim();
            if (!pincode) {
                message.textContent = 'Please enter a pincode.';
                return;
            }
            setCookie('user_pincode', pincode, 30);

            const resp = await fetch('/wp-json/pincode-checker/v1/check', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ pincode })
            });
            const result = await resp.json();
            message.textContent = result.message;
        });
    });

    function getCookie(name) {
        const nameEQ = name + '=';
        const ca = document.cookie.split(';');
        for (let c of ca) {
            c = c.trim();
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
        }
        return null;
    }

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = `${name}=${value}; expires=${d.toUTCString()}; path=/`;
    }
});

