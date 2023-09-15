$(document).ready(function() {
    handleTagInput();

    $('#filterInput').on('input', filterWords);
});

function handleTagInput() {
    const tagInput = $("#tag");
    const tagsContainer = $("#tags-container");
    const tagsInput = $("#tags");
    const tagsError = $("#tags-error");

    const maxTags = 6;
    const tags = [];

    tagInput.on("keydown", function(e) {
        if (e.key == "Enter" && tagInput.val().trim() != "") {
            e.preventDefault();

            if (tags.length < maxTags) {
                tagsError.addClass("d-none");

                let tag = tagInput.val().toLowerCase();
                tag = tag.replace(/[ '",.:;\-]/g, '');
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
                tagSpan.append(tagDeleteButton);
                tagContainer.append(tagSpan);
                tagsContainer.append(tagContainer);
                tagInput.val("");
            } else {
                tagsError.text("Maksymalna dozwolona ilość tagów to " + maxTags);
                tagsError.removeClass("d-none");
            }
        }
    });
}

function formatDateTime(dateTime) {
    var date = new Date(dateTime);
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0');
    var day = date.getDate().toString().padStart(2, '0');
    return year + '-' + month + '-' + day;
}

function fillTable(data) {
    var tableBody = $('#wordsTable tbody');
    tableBody.empty();

    $.each(data, function (index, word) {
        var row = $('<tr>');
        row.append('<td>' + word.name + '</td>');
        
        if (word.tags && word.tags.length > 0) {
            var tagsCell = $('<td>');
            var tagsText = word.tags.join(', ');
            var formattedTags = '';

            for (var i = 0; i < word.tags.length; i += 3) {
                var tagChunk = word.tags.slice(i, i + 3).join(', ');
                formattedTags += tagChunk + ',<br>';
            }

            tagsCell.html(formattedTags);
            row.append(tagsCell);
        } else {
            row.append('<td class="text-danger">brak</td>');
        }
        
        row.append('<td>' + formatDateTime(word.created_at) + '</td>');
        tableBody.append(row);
    });
}

function filterWords() {
    var inputText = $(this).val().toLowerCase();
    var filteredWords = wordsData.filter(function (word) {
        return (
            word.name.toLowerCase().includes(inputText) ||
            (word.tags && word.tags.join(', ').toLowerCase().includes(inputText))
        );
    });

    fillTable(filteredWords);
}