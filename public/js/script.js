function previewFile() {
    var file = $("#image").get(0).files[0];
    if (file) {

        var reader = new FileReader();
        reader.onload = function () {
            $("#previewImg").attr("src", reader.result);
        };
       
        reader.readAsDataURL(file);
        $(".save-image").prop("disabled", false);
   }
}

$(".password-checkbox").on("click", function () {
    let isDisabled = $(".password-field").prop("disabled");
    let passwordField = $(".password-field");

    if (!isDisabled && passwordField.val().length > 0) {
        passwordField.val("");
    }
});

$(".search-term").on("keyup", function () {
    value = $(this).val().trim();
    searchBtn = $(".search-btn");

    if (value.length > 1) {
        searchBtn.prop("disabled", false);
    } else {
        searchBtn.prop("disabled", true);
    }
});

$(document).ready(function () {
    $(".msg-box").delay(2500).slideUp();
});

$(".add-to-cart-btn").on("click", function () {
    $.ajax({
        url: BASE_URL + "/shop/add-to-cart",
        type: "GET",
        dataType: "html",
        data: { id: $(this).data("id") },
        success: function (response) {
            location.reload();
        },
    });
});

$(function () {
    $(".toggle-featured").change(function (e) {
        const status = e.target.checked == true ? 1 : 0;
        const product_id = $(e.target).attr("data-id");
        $.ajax({
            url: BASE_URL + "/cms/feature-product",
            type: "GET",
            dataType: "html",
            data: { product_id, status },
            success: function (response) {},
        });
    });
});

$(".update-cart").on("click", function () {
    $.ajax({
        url: BASE_URL + "/shop/update-cart",
        type: "GET",
        dataType: "html",
        data: { id: $(this).data("id"), op: $(this).val() },
        success: function (response) {
            location.reload();
        },
    });
});

String.prototype.permalink = function () {
    return this.toString().trim().toLowerCase().replace(/\s/g, "-");
};

$(".origin-text").on("keyup", function () {
    $(".target-text").val($(this).val().permalink());
});

$(".password-checkbox").on("click", function () {
    $(".password-field").prop("disabled", function (i, v) {
        return !v;
    });
});

$(".search-term").keyup(function () {
    var query = $(".search-term").val().trim();
    var _token = $('input[name="_token"]').val();

    if (query.length > 0) {
        $.ajax({
            url: BASE_URL + "/shop/autocomplete",
            method: "POST",
            data: {
                _token: _token,
                search: 1,
                q: query,
            },
            success: function (data) {
                $("#response").html(data);
            },
        });
    }
    if (query.length === 0) {
        $("#response").empty();
    }
});

$(document).on("click", "li", function () {
    $(".search-term").val($(this).text());
    $("#response").fadeOut();
});
