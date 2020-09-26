$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function () {
    $('#example').DataTable();
});

$(function () {

    let preloaded = [{
            id: 1,
            src: "https://colorlib.com/wp/wp-content/uploads/sites/2/jquery-file-upload-scripts.png"
        },
        {
            id: 2,
            src: "https://picsum.photos/500/500?random=2"
        },
        {
            id: 3,
            src: "https://picsum.photos/500/500?random=3"
        },
    ];

    $(".history-img, .banner-img, .edit-dish-img, .new-dish-img").imageUploader({
        preloaded: preloaded,
        imagesInputName: "photos",
        preloadedInputName: "old",
        maxSize: 2 * 1024 * 1024,
        maxFiles: 3,
    });

    $("#history-form, #banner-images, #edit-dish-form, #new-dish-form").on("submit", function (event) {
        // Stop propagation
        event.preventDefault();
        event.stopPropagation();

        // Get the input file
        let $inputImages = $form.find('input[name^="images"]');
        if (!$inputImages.length) {
            $inputImages = $form.find('input[name^="photos"]');
        }

        // Get the preloaded inputs
        let $inputPreloaded = $form.find('input[name^="old"]');
        if ($inputPreloaded.length) {
            // Get the ids
            let $preloadedIds = $("<ul>");
            for (let iP of $inputPreloaded) {
                $("<li>", {
                    text: "#" + iP.value
                }).appendTo($preloadedIds);
            }
        }
    });
});
