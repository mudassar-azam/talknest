// brk post and fetch comment 

// Variables to keep track of pagination
var brkcurrentPage = 1;
var brkcommentsPerPage = 5;

// Function to fetch comments
function fetchbrkComments() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchbrkComments', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var comments = response.comments;

            // Calculate start and end index for pagination
            var startIndex = (brkcurrentPage - 1) * brkcommentsPerPage;
            var endIndex = startIndex + brkcommentsPerPage;
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
            var brkCommentsContainer = document.getElementById('brkcommentsContainer');
            brkCommentsContainer.innerHTML = commentsHtml;
        }
    };
    xhr.send();
}

// Event listener for next page button
document.getElementById('brknextPageBtn').addEventListener('click', function() {
    brkcurrentPage++;
    fetchbrkComments();
});

// Event listener for previous page button
document.getElementById('brkprevPageBtn').addEventListener('click', function() {
    if (brkcurrentPage > 1) {
        brkcurrentPage--;
        fetchbrkComments();
    }
});


// Function for comment form submission
var brkForm = document.getElementById('brkCommentForm');
brkForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(brkForm);
    var xhr = new XMLHttpRequest();
    xhr.open(brkForm.method, brkForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                brkForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Comment added successfully BRK',
                });
                var currentTime = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                fetchbrkComments();
                var newComment = '<div class="comment" style="color:white; border-radius: 10px; border:2px solid white; padding: 10px; margin-bottom: 10px;">' + 
                '<img src="' + imageUrl + '"  style=" border-radius:50%; width: 40px; height: 40px; display: inline-block; vertical-align: middle; margin-right: 10px; margin-bottom: 4px;">' +
                '<p style="color:white; display: inline-block;">' + formData.get('brkComment') + '</p>' +
                '<span style="display: inline-block; font-size: 15px; color: #ccc; float: right;">' + currentTime + '</span>' +
                '</div>';
            document.getElementById('brkcommentsContainer').insertAdjacentHTML('beforeend', newComment);
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

