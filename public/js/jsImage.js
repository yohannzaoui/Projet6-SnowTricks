var $addImageLink = $('<a href="#" class="add_image_link">Ajoute une image</a>');
var $newLinkLi = $('<li></li>').append($addImageLink);

var $addVideoLink = $('<a href="#" class="add_video_link">Ajoute une vidéo</a>');
var $newLinkLi1 = $('<li></li>').append($addVideoLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    var $collectionHolder = $('ul.images');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addImageLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see code block below)
        addImageForm($collectionHolder, $newLinkLi);
    });


});

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    var $collectionHolder = $('ul.videos');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi1);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addVideoLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see code block below)
        addVideoForm($collectionHolder, $newLinkLi1);
    });


});

function addImageForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '$$name$$' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);

    // also add a remove button, just for this example
    $newFormLi.append('<a href="#" class="remove-image">Supprimé</a>');

    $newLinkLi.before($newFormLi);

    // handle the removal, just for this example
    $('.remove-image').click(function(e) {
        e.preventDefault();

        $(this).parent().remove();

        return false;
    });
}

function addVideoForm($collectionHolder, $newLinkLi1) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '$$name$$' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);

    // also add a remove button, just for this example
    $newFormLi.append('<a href="#" class="remove-video">Supprimé</a>');

    $newLinkLi1.before($newFormLi);

    // handle the removal, just for this example
    $('.remove-video').click(function(e) {
        e.preventDefault();

        $(this).parent().remove();

        return false;
    });
}