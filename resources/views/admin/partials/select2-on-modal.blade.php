<script>
(function(){
    var oldSelect2 = jQuery.fn.select2;
    jQuery.fn.select2 = function() {
        const modalParent = jQuery(this).parents('div.modal').first();
        // Only apply custom logic if the select is inside a modal
        if (modalParent.length > 0) {
            if (arguments.length === 0) {
                arguments = [{dropdownParent: modalParent}];
            } else if (arguments.length === 1
                        && typeof arguments[0] === 'object'
                        && typeof arguments[0].dropdownParent === 'undefined') {
                arguments[0].dropdownParent = modalParent;
            }
            return oldSelect2.apply(this, arguments);
        }
        // Otherwise, use the original select2
        return oldSelect2.apply(this, arguments);
    };
    // Copy all properties of the old function to the new
    for (var key in oldSelect2) {
        jQuery.fn.select2[key] = oldSelect2[key];
    }
})();
</script>