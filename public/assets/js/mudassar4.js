// googl post and fetch comment 

var googlcurrentPage = 1;
var googlcommentsPerPage = 5;

// Function to fetch comments
function fetchgooglComments() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchgooglComments', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var comments = response.comments;

            // Calculate start and end index for pagination
            var startIndex = (googlcurrentPage - 1) * googlcommentsPerPage;
            var endIndex = startIndex + googlcommentsPerPage;
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
            var googlCommentsContainer = document.getElementById('googlcommentsContainer');
            googlCommentsContainer.innerHTML = commentsHtml;
        }
    };
    xhr.send();
}

// Event listener for next page button
document.getElementById('googlnextPageBtn').addEventListener('click', function() {
    googlcurrentPage++;
    fetchgooglComments();
});

// Event listener for previous page button
document.getElementById('googlprevPageBtn').addEventListener('click', function() {
    if (googlcurrentPage > 1) {
        googlcurrentPage--;
        fetchgooglComments();
    }
});

// Function for comment form submission
var googlForm = document.getElementById('googlCommentForm');
googlForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(googlForm);
    var xhr = new XMLHttpRequest();
    xhr.open(googlForm.method, googlForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                googlForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Comment added successfully GOOGL',
                });
                var currentTime = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                fetchgooglComments();
                var newComment = 
                '<div style="display:flex; flex-direction:column;  margin:5px 0px; border-radius: 10px; border:2px solid white; padding: 10px;">' +
                '<div class="comment" style="display:flex; align-items: center;" >' + 
                '<img src="' + imageUrl + '"  style=" border-radius:50%; width: 40px; height: 40px; display: inline-block; vertical-align: middle; margin-right: 10px; margin-bottom: 4px;">' +
                '<div style="font-size: 15px; color: #ccc; ">' + response.user_name + '</div>' +
                '<div style="font-size: 15px; color: #ccc; flex:1;text-align: end;">' + currentTime  + '</div>' +
                '</div>' +
                '<div class="comment" style="">' + 
                '<p style="color:white; word-wrap: break-word; vertical-align: middle;">' + formData.get('googlComment') + '</p>' +
                '</div>' +
                '</div>';
            document.getElementById('googlcommentsContainer').insertAdjacentHTML('beforeend', newComment);
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

