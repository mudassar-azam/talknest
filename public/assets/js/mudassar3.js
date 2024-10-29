// vti post and fetch comment 

// Variables to keep track of pagination
var vticurrentPage = 1;
var vticommentsPerPage = 5;

// Function to fetch comments
function fetchvtiComments() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchvtiComments', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var comments = response.comments;

            // Calculate start and end index for pagination
            var startIndex = (vticurrentPage - 1) * vticommentsPerPage;
            var endIndex = startIndex + vticommentsPerPage;
            var paginatedComments = comments.slice(startIndex, endIndex);

            var commentsHtml = '';
            paginatedComments.forEach(function(comment) {
                var createdAtDate = new Date(comment.created_at);
                var formattedDate = createdAtDate.toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                commentsHtml +=
                '<div style="display:flex; flex-direction:column; margin:5px 0px;border-bottom:1px solid white;">' +
                '<div class="comment" style="display:flex; align-items: start;">' + 
                '<img src="' + imageUrl + '"  style=" border-radius:50%; width: 32px; height: 30px; display: inline-block; vertical-align: middle; margin-right: 10px; margin-bottom: 4px;">' +
                '<div style="font-size: 15px; color: #ccc; ">' +  
                    '<span>' + comment.user_name + '</span>' +
                    '<div class="comment" style="">' + 
                    '<p style="color:white; word-wrap: break-word; vertical-align: middle;">' + comment.comment_message + '</p>' +
                    '</div>' +
                '</div>' +
                '<div style="font-size: 15px; color: #ccc; flex:1;text-align: start; padding-left:3em;">' + formattedDate  + '</div>' +
                '</div>' +
                '</div>';
            });
            var vtiCommentsContainer = document.getElementById('vticommentsContainer');
            vtiCommentsContainer.innerHTML = commentsHtml;
        }
    };
    xhr.send();
}

// Event listener for next page button
document.getElementById('vtinextPageBtn').addEventListener('click', function() {
    vticurrentPage++;
    fetchvtiComments();
});

// Event listener for previous page button
document.getElementById('vtiprevPageBtn').addEventListener('click', function() {
    if (vticurrentPage > 1) {
        vticurrentPage--;
        fetchvtiComments();
    }
});


// Function for comment form submission
var vtiForm = document.getElementById('vtiCommentForm');
vtiForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(vtiForm);
    var xhr = new XMLHttpRequest();
    xhr.open(vtiForm.method, vtiForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                vtiForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Comment added successfully VTI',
                });
                var currentTime = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                fetchvtiComments();
                var newComment = 
                '<div style="display:flex; flex-direction:column;  margin:5px 0px; border-radius: 10px; border:2px solid white; padding: 10px;">' +
                '<div class="comment" style="display:flex; align-items: center;" >' + 
                '<img src="' + imageUrl + '"  style=" border-radius:50%; width: 40px; height: 40px; display: inline-block; vertical-align: middle; margin-right: 10px; margin-bottom: 4px;">' +
                '<div style="font-size: 15px; color: #ccc; ">' + response.user_name + '</div>' +
                '<div style="font-size: 15px; color: #ccc; flex:1;text-align: end;">' + currentTime  + '</div>' +
                '</div>' +
                '<div class="comment" style="">' + 
                '<p style="color:white; word-wrap: break-word; vertical-align: middle;">' + formData.get('vtiComment') + '</p>' +
                '</div>' +
                '</div>';
            document.getElementById('vticommentsContainer').insertAdjacentHTML('beforeend', newComment);
            } else {
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

