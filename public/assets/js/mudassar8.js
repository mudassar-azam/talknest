
function fetchtPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchtPosts', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var posts = response.posts;
            var postsHtml = '';
            posts.forEach(function(post) {
                var postRoute = routeUrl.replace(':id', post.id);
                var postRoute2 = routeUrl2.replace(':id', post.id);
                var postRoute3 = post.add_to_fav === 0 ? 'https://talknest.canvasolutions.co.uk/addToFav/' + post.id : 'https://talknest.canvasolutions.co.uk/removeFromFav/' + post.id;
               postsHtml +=
                    '<div class="col-lg-3 col-md-4 mb-4 mb-lg-0 py-3" >' +
                    '<div class="card stockresourcecard d-flex flex-column" style="border-radius:1.7rem; height: 400px;">' +
                    '<a href="' + postRoute + '" style="color: black;">' +
                    '<img src="' + imageBaseUrl + '/' + post.image + '" alt="" class="w-100 card-img-top" style="object-fit: cover; height: 275px;">' +
                    '<div class="card-body p-4" style="display: flex;justify-content: space-between;align-items: center;">' +
                    '<h5 class="mb-0">' + post.name + '</h5>';

                // Check if user is logged in
                if (response.authenticated) {
                    // postsHtml +=
                    //     '<div style="margin-top:10px; ">' +
                    //     '<a href="' + postRoute2 + '">' +
                    //     '<button style="background-color:#2EAAA6; font-size: 16px;padding: 8px; border-radius: 5px;color: white; margin-right: 5px;">Edit</button>' +
                    //     '</a>' +
                    //     '<button onclick="deletePost(' + post.id + ')" style="background-color:red; font-size: 16px;padding: 8px; border-radius: 5px;color: white;">Delete</button>' +
                    //     '</div>';
                        
                        postsHtml +=
                            '<div style="margin-top:10px; position: relative;">' +
                            '<div class="dropdown">' +
                            '<button class="dots-btn" disabled>&#8942;</button>' +
                                '<div class="dropdown-content">' +
                                    '<a href="' + postRoute2 + '">Edit</a>' +
                                    '<a href="#" onclick="deletePost(' + post.id + ')">Delete</a>' +
                                    '<a href="' + postRoute3 + '">' + (post.add_to_fav === 1 ? 'Remove Favorite' : 'Add To Favorite') + '</a>' +
                                '</div>' +
                            '</div>' +
                            '</div>';

                }

                postsHtml +=
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>';
            });

            var myPostContainer = document.getElementById('myPostContainer');
            myPostContainer.innerHTML = postsHtml;
        }
    };
    xhr.send();
}


// for posting

// Function for posting
var postForm = document.getElementById('postDataForm');
postForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(postForm);
    var xhr = new XMLHttpRequest();
    xhr.open(postForm.method, postForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                postForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Post added successfully, Thanks',
                });
                fetchtPosts();
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + response.message,
                });
            }
        }
    };
    xhr.send(formData);
});

function deletePost(postId) {
    console.log(postId);
    var confirmation = confirm('Are you sure you want to delete this post?');
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/deletePost/' + postId, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        // Obtain CSRF token from meta tag
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Include CSRF token in headers
        xhr.onload = function() {
            if (xhr.status === 200 && xhr.responseText) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Post deleted successfully',
                    });
                    fetchtPosts(); 
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: 'You can not delete this post',
                    });
                }
            }
        };
        xhr.send();
    }
}