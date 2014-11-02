function _animateCatalog(jQuery) {
    // testing code to test jQuery run fine
    var checking = jQuery('.product-image img').attr('data-animate');
    alert(checking);
}

/**
 * Helper script to run the animatecatalog on jQuery
 * Code was adapted from CSS trick
 * http://css-tricks.com/snippets/jquery/load-jquery-only-if-not-present/
 *
 */
if (typeof jQuery == 'undefined') {
    if (typeof $ == 'function') {
        // warning, global var
        thisPageUsingOtherJSLibrary = true;
    }
    function getScript(url, success) {
        var script     = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
            done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                done = true;
                // callback function provided as param
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            };
        };
        head.appendChild(script);
    };
    getScript('http://code.jquery.com/jquery-1.11.1.js', function() {
        if (typeof jQuery=='undefined') {
            // Super failsafe - still somehow failed...
        } else {
            // jQuery loaded! Make sure to use .noConflict just in case
            if (thisPageUsingOtherJSLibrary) {
                jQuery(document).ready(_animateCatalog);
            } else {
                // Use .noConflict(), then run your jQuery Code
                jQuery(document).ready(_animateCatalog);
            }
        }
    });
} else { // jQuery was already loaded
    jQuery(document).ready(_animateCatalog);
};