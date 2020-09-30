$(document).ready(function () {
    $("#example").DataTable();
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(".category-list").change(function () {
        var selectedCategory = $(this).children("option:selected").val();
        $(".new-dish-category   ").val(selectedCategory);
        if (selectedCategory == 0) {
            $(".addNewDish").css("display", "none");
        } else {
            $(".addNewDish").css("display", "inline-block");
        }
        $.ajax({
            url: 'dish/dishes',
            type: "get",
            data: {
                'id': selectedCategory
            },
            success: function (response) { // What to do if we succeed

                if (response.length != 0) {
                    $('.edit-dish-list').empty();
                    $.each(response, function (key, value) {
                        $('.edit-dish-list').append(' <li><span>' + response[key].name + '</span><span><button class="btn btn-light edit-dish-btn" id="edit-dish-btn-' + response[key].id + '" data-toggle="modal" data-target="#editDish"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></span></li>');
                    });
                } else {
                    $('.edit-dish-list').empty();
                    $('.edit-dish-list').append('<li>No Data Available</li>');

                }
            }
        });
    });

    $('.edit-dish-list').on('click', '.edit-dish-btn', function () {
        $('#delete-img-btn').remove();
        $('.delete-img-class').remove();
        var str = this.id;
        str = str.replace('edit-dish-btn-', "");
        $.ajax({
            url: 'dish/edit',
            type: "get",
            data: {
                'id': str
            },
            success: function (response) {
                $('input[name="edit-dish-id"]').attr('value', response[0].id);
                $('input[name="edit-dish-name"]').attr('value', response[0].name);
                $('input[name="edit-dish-price"]').attr('value', response[0].price);
                $('input[name="edit-dish-discount"]').attr('value', response[0].before_discount_price);
                $('[name="edit-dish-description"]').val(response[0].description);

                if (response[0].availibility == 0) {
                    $('[name=edit-dish-availablity]').val('');
                    $('[name=edit-dish-availablity]').val('not-available');
                } else if (response[0].availibility == 1) {
                    $('[name=edit-dish-availablity]').val('');
                    $('[name=edit-dish-availablity]').val('available');
                }
                if (response[0].sale == 0) {
                    $('[name=edit-dish-sale]').val('');
                    $('[name=edit-dish-sale]').val('not-sale');
                } else if (response[0].sale == 1) {
                    $('[name=edit-dish-sale]').val('');
                    $('[name=edit-dish-sale]').val('sale');
                }
                if (response[0].special_product == 0) {
                    $('[name=edit-dish-special]').val('');
                    $('[name=edit-dish-special]').val('not-special');
                } else if (response[0].special_product == 1) {
                    $('[name=edit-dish-special]').val('');
                    $('[name=edit-dish-special]').val('special');
                }

                $("<img src='../storage/" + response[0].image1 + "' class='delete-img-class'></img>").insertAfter(".edit-dish-image1");
                $('.edit-dish-image1')
                    .parent()
                    .prepend(
                        '<button type="button" id="delete-img-btn"><i class="fa fa-times" aria-hidden="true"></i></button>'
                    );
                if (response[0].image2 != null) {
                    $("<img src='../storage/" + response[0].image2 + "' class='delete-img-class'></img>").insertAfter(".edit-dish-image2");
                    $('.edit-dish-image2')
                        .parent()
                        .prepend(
                            '<button type="button" id="delete-img-btn"><i class="fa fa-times" aria-hidden="true"></i></button>'
                        );
                }
                if (response[0].image3 != null) {
                    $("<img src='../storage/" + response[0].image3 + "' class='delete-img-class'></img>").insertAfter(".edit-dish-image3");
                    $('.edit-dish-image3')
                        .parent()
                        .prepend(
                            '<button type="button" id="delete-img-btn"><i class="fa fa-times" aria-hidden="true"></i></button>'
                        );
                }

            }
        });
    });

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var htmlPreview = '<img src="' + e.target.result + '" />';
                $(input).parent().append(htmlPreview);
                $(input)
                    .parent()
                    .prepend(
                        '<button type="button" id="delete-img-btn"><i class="fa fa-times" aria-hidden="true"></i></button>'
                    );
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".dropzone-wrapper").on("click", "#delete-img-btn", function (e) {
        $(this).siblings(":last").remove();
        $(this).siblings(":last").val("");
        $(this).remove();
    });

    $(".dropzone").change(function () {
        readFile(this);
    });

    $(".dropzone-wrapper").on("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass("dragover");
    });

    $(".dropzone-wrapper").on("dragleave", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass("dragover");
    });
});

$(function () {
    $(".new-dish-img").imageUploader({
        imagesInputName: "photos",
        maxSize: 2 * 1024 * 1024,
        maxFiles: 3,
    });
});
