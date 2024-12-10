jQuery(document).ready(function($) {
    $('.mark-important').on('click', function(e) {
        e.preventDefault();

        let faq_id = $(this).data('id'); // ID of the FAQ post

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'arcade_mark_faq_important', // PHP function
                faq_id: faq_id,
            },
            success: function(response) {
                if (response.success) {
                    alert('FAQ marked as important!');
                } else {
                    alert('Failed to mark FAQ.');
                }
            }
        });
    });
});
