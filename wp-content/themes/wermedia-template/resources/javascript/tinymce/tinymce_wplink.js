jQuery(document).ready(($) => {
    // Add a custom field to the link editor dialog
    $(document).on('wplink-open', (event, link) => { // Pass link information to the event handler
        const $linkOptions = $("#link-options");
        const linkId = link.$el.attr("data-id"); // Assuming each link has a data-id attribute

        // Check if the select box already exists
        if ($("#wp-link-button-style-" + linkId).length === 0) { // Unique ID for each select box
            // Create the select box
            const $selectBox = $("<select></select>").attr({
                "id": "wp-link-button-style-" + linkId, // Unique ID
                "name": "wp-link-button-style"
            });

            // Define the options
            const options = [
                { value: "", label: "Geen button" },
                { value: "button__solid--primary", label: "Groen" },
                { value: "button__solid--secondary", label: "Geel" }
            ];

            // Add the options to the select box
            options.forEach((option) => {
                const $option = $("<option></option>").attr("value", option.value).text(option.label);
                if (option.value === selectedStyle) { // Set selected attribute based on the link's data
                    $option.attr("selected", "selected");
                }
                $selectBox.append($option);
            });

            // Create a wrapping div for the label and select box
            const $labelAndSelectBoxContainer = $('<div></div>').attr("id", "wp-label-select-container-" + linkId); // Unique ID

            // Create a label for the select box
            const $label = $("<label></label>").attr("for", "wp-link-button-style-" + linkId).text("Button Style:").prepend('<span></span>');

            // Append the label and select box to the wrapping div
            $labelAndSelectBoxContainer.append($label).append($selectBox);
            $labelAndSelectBoxContainer.css('margin-top', '10px');

            // Append the wrapping div to the link options
            $linkOptions.append($labelAndSelectBoxContainer);
        }

        if (wpLink && typeof(wpLink.getAttrs) == "function") {
            wpLink.getAttrs = () => {
                wpLink.correctURL();

                const selectedStyle = $("#wp-link-button-style-" + linkId).val(); // Unique ID
                let buttonClass = "";

                if (selectedStyle === "button__solid--primary") {
                    buttonClass = "button button__solid--primary button--rounded";
                } else if (selectedStyle === "button__solid--secondary") {
                    buttonClass = "button button__solid--secondary button--rounded";
                }

                return {
                    href: $.trim($("#wp-link-url").val()),
                    target: $("#wp-link-target").prop("checked") ? "_blank" : null,
                    class: buttonClass
                };
            };
        }
    });
});
