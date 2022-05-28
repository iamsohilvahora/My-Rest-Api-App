$(document).ready(function (){
    $('#example').DataTable();
    // Create post form
    $('#createWpPostForm').on("submit", function(){
        // var formData = $(this).serialize();
        // create nonce value
        $.post(site_url + '/api/get_nonce/?controller=posts&method=create_post', function(response){
            var nonce = response.nonce;
            var postData = 'nonce=' + nonce + '&' + $('#createWpPostForm').serialize() + '&status=publish'; 
            // create post 
            $.post(site_url + '/api/posts/create_post/', postData, function(response){
                alert("Post created successfully.");
                setTimeout(function(){
                    location.reload();
                }, 1000);
            });
        });
    });
    // get all post
    load_wp_post();
    function load_wp_post(){
        $.post(site_url + '/api/get_posts/', function(response){
            var posts= response.posts;
            var html = "";
            $.each(posts, function(index, post){
                html += '<tr><td>'+(index+1)+'</td><td>'+post.title+'</td><td>'+post.content+'</td><td>'+post.slug+'</td><td>'+post.status+'</td><td><a class="btn btn-info post-edit" href="Javascript:void(0);" data-toggle="modal" data-target="#editPost" data-id="'+post.id+'">Edit</a><a class="btn btn-danger post-delete" href="Javascript:void(0);" data-id="'+post.id+'">Delete</a></td></tr>'; 
            });
            $('#table-postdata').html(html);
        });
    }
    // delete post
    $(document).on('click', '.post-delete', function(){
        var postId = $(this).attr('data-id');
        var conf = confirm('Are you sure want to delete ? ');    
        if(conf){ // true  
            // create nonce value
            $.post(site_url + '/api/get_nonce/?controller=posts&method=delete_post', function(response){
                var nonce = response.nonce;
                var postData = 'nonce=' + nonce + '&' + 'id=' + postId; 
                // create post 
                $.post(site_url + '/api/posts/delete_post/', postData, function(response){
                        alert("Post deleted successfully.");
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                });
            });
        }
    });  
    // on click on edit button
    $(document).on('click', '.post-edit', function(){
        var postId = $(this).attr('data-id');
        var title = $(this).parents("tr").find("td:nth(1)").text();
        var desc = $(this).parents("tr").find("td:nth(2)").text();
        $("#editTitle").val(title);
        $("#editDescription").val(desc);
        $("#post-id").val(postId);
    });
    // Edit post form
    $('#editWpPostForm').on("submit", function(){
        // create nonce value
        $.post(site_url + '/api/get_nonce/?controller=posts&method=update_post', function(response){
            var nonce = response.nonce;
            var postData = 'nonce=' + nonce + '&' + $('#editWpPostForm').serialize(); 
            // Update post 
            $.post(site_url + '/api/posts/update_post/', postData, function(response){
                alert("Post Updated successfully.");
                setTimeout(function(){
                    location.reload();
                }, 1000);
            });
        });
    });

});