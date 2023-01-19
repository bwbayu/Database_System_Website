$(function() {

    $('.show-add-modal').on('click', function() {
        $('#formModalLabel').html('Add New Book Data');
        $('#btn-book-edit').attr('style', 'display: none;');
        $('#btn-book-add').attr('style', 'display: unset;');
        $('#book-title').val("");
        $('#book-category').val("");
        $('#book-author').val("");
        $('#book-publisher').val("");
        $('#book-price').val("");
        $('#book-synopsis').val("");
    });

    $('.show-edit-modal').on('click', function() {

        $('#formModalLabel').html('Edit Book Data');
        $('#btn-book-add').attr('style', 'display: none;');
        $('#btn-book-edit').attr('style', 'display: unset;');

        const id = $(this).data('id');

        $.ajax({
            url: 'fetchData.php',
            data: {id : id},
            method: 'POST',
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#id').val(data.book_id);
                $('#book-title').val(data.book_title);
                $('#book-category').val(data.category_id);
                $('#book-author').val(data.author_id);
                $('#book-publisher').val(data.book_publisher);
                $('#book-price').val(data.book_price);
                $('#book-synopsis').val(data.book_synopsis);
            }
        });
    });

});