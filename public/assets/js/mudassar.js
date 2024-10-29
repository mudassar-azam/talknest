// tsla post and fetch comment 

// Variables to keep track of pagination
var currentPage = 1;
var commentsPerPage = 5;

// Function to fetch comments
function fetchtslaComments() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchtslaComments', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var comments = response.comments;

            // Calculate start and end index for pagination
            var startIndex = (currentPage - 1) * commentsPerPage;
            var endIndex = startIndex + commentsPerPage;
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
            var tslaCommentsContainer = document.getElementById('tslacommentsContainer');
            tslaCommentsContainer.innerHTML = commentsHtml;
        }
    };
    xhr.send();
}

// Event listener for next page button
document.getElementById('nextPageBtn').addEventListener('click', function() {
    currentPage++;
    fetchtslaComments();
});

// Event listener for previous page button
document.getElementById('prevPageBtn').addEventListener('click', function() {
    if (currentPage > 1) {
        currentPage--;
        fetchtslaComments();
    }
});



// Function for comment form submission
var tslaForm = document.getElementById('tslaCommentForm');
tslaForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(tslaForm);
    var xhr = new XMLHttpRequest();
    xhr.open(tslaForm.method, tslaForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                tslaForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Comment added successfully TSLA.',
                });
                var currentTime = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                fetchtslaComments();
                var newComment = 
                '<div style="display:flex; flex-direction:column;  margin:5px 0px; border-radius: 10px; border:2px solid white; padding: 10px;">' +
                '<div class="comment" style="display:flex; align-items: center;" >' + 
                '<img src="' + imageUrl + '"  style=" border-radius:50%; width: 40px; height: 40px; display: inline-block; vertical-align: middle; margin-right: 10px; margin-bottom: 4px;">' +
                '<div style="font-size: 15px; color: #ccc; ">' + response.user_name + '</div>' +
                '<div style="font-size: 15px; color: #ccc; flex:1;text-align: end;">' + currentTime  + '</div>' +
                '</div>' +
                '<div class="comment" style="">' + 
                '<p style="color:white; word-wrap: break-word; vertical-align: middle;">' + formData.get('tslaComment') + '</p>' +
                '</div>' +
                '</div>';
            document.getElementById('tslacommentsContainer').insertAdjacentHTML('beforeend', newComment);
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

