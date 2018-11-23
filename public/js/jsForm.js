

$(".btn-add").on("click", function() {
    var $collectionHolder = $($(this).data("rel"));
    var index = $collectionHolder.data("index");
    var prototype = $collectionHolder.data("prototype");
    $collectionHolder.append(prototype.replace(/__name__/g, index));
    $collectionHolder.data("index", index+1);
});

$("body").on("click", ".btn-remove", function() {
    $($(this).data("rel")).remove();
})