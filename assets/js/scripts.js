$(document).ready(function() {
    // search functionality
    $('#search').keyup(function() {
        var searchQuery = $(this).val();
        $.ajax({
            url: 'search.php',
            type: 'GET',
            data: { search: searchQuery },
            success: function(data) {
                $('#articles').html(data);
            }
        });
    });

    // Delete articale
    $(document).on('click', '.delete-article', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this article?')) {
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: { id: id },
                success: function(data) {
                    location.reload('index.php');
                }
            });
        }
    });
});
