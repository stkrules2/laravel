$(document).ready(function () {
    $('#example').DataTable();
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(".category-list").change(function () {
        var selectedCategory = $(this).children("option:selected").val();
        $(".new-dish-category   ").val(selectedCategory);
        if (selectedCategory == 0) {
            $(".addNewDish").css('display', 'none');
        } else {
            $(".addNewDish").css('display', 'inline-block');
        }
    });

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var htmlPreview =
                    '<img src="' + e.target.result + '" />';
                $(input).parent().append(htmlPreview);
                $(input).parent().prepend('<button type="button" id="delete-img-btn"><i class="fa fa-times" aria-hidden="true"></i></button>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.dropzone-wrapper').on('click', '#delete-img-btn', function (e) {
        $(this).siblings(":last").remove();
        $(this).siblings(":last").val('');
        $(this).remove();
    });

    $(".dropzone").change(function () {
        readFile(this);
    });

    $('.dropzone-wrapper').on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
});

$(function () {
    $(".new-dish-img").imageUploader({
        imagesInputName: "photos",
        maxSize: 2 * 1024 * 1024,
        maxFiles: 3,
    });
});
