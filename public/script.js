$(document).ready(function() {
    handleTagInput();
});

function handleTagInput() {
    const tagInput = $("#tag");
    const tagsContainer = $("#tags-container");
    const tagsInput = $("#tags");
    const tags = [];

    tagInput.on("keydown", function(e) {
        if (e.key == "Enter" && tagInput.val().trim() != "") {
            e.preventDefault();

            const tag = tagInput.val().trim();
            tags.push(tag);
            tagsInput.val(tags.join(","));

            const tagContainer = $("<div>")
                .addClass("tag-container");

            const tagSpan = $("<span>")
                .text(tag)
                .addClass("badge badge-primary mr-2 tag-text");

            const tagDeleteButton = $("<button>")
                .text("X")
                .addClass("btn btn-danger btn-sm tag-delete-btn ml-1")
                .click(function() {
                    const index = tags.indexOf(tag);
                    if (index != -1) {
                        tags.splice(index, 1);
                        tagsInput.val(tags.join(","));
                    }
                    tagContainer.remove();
                });
                tagSpan.append(tagDeleteButton)
            tagContainer.append(tagSpan);
            tagsContainer.append(tagContainer);
            tagInput.val("");
        }
    });
}