// Category post and fetch comment 

//function for fetching comments
function fetchCatComments(postId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fetchCatComment/' + postId, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            var comments = response.comments;

           

            if( response.noc === 0){
                var commentCountHtml = '';
                commentCountHtml += '<p style="background-color:white; padding:20px; font-weight:bold; color:black;">' +"There is no posted comments related to this post"+ '</p>';
                var commentCount = document.getElementById('commentCount');
                commentCount.innerHTML = commentCountHtml;

            }else{
                var commentsHtml = '';
                comments.forEach(function(comment) {
                    var createdAtDate = new Date(comment.created_at);
                    var formattedDate = createdAtDate.toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: '2-digit', 
                        day: '2-digit' 
                    });
                    commentsHtml +=
                    '<div class="comment-box">'+
                        '<div style="padding: 25px; background-color:white; margin-top:15px;"  class="comment">'+
                            '<div class="comment-inner clearfix">'+
                                '<div class="comment-info clearfix">'+
                                    '<strong style="font-size: 20px; font-weight: 700; text-transform: capitalize; font-family: var(--font-family-Libre);">'+  comment.username   +'</strong>'+
                                    '<div class="comment-time" style="font-size: 15px;color: var(--main-color);font-weight: 400;margin-top: 3px;">'+ formattedDate  +'</div>'+
                                '</div>'+
                                '<div class="text" style="font-size: 22px; margin-top: 15px ;">'+comment.text+'</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                });
                var commentBox = document.getElementById('commentBox');
                commentBox.innerHTML = commentsHtml;
            }
        }
    };
    xhr.send();
}

// Function for comment form submission
var catCommentForm = document.getElementById('catCommentForm');
catCommentForm.addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(catCommentForm);
    var xhr = new XMLHttpRequest();
    xhr.open(catCommentForm.method, catCommentForm.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {

                document.getElementById('commentCount').textContent = '';
                catCommentForm.reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your Comment has  added successfully ',
                });
                var currentTime = new Date().toLocaleDateString('en-US', { 
                    year: 'numeric', 
                    month: '2-digit', 
                    day: '2-digit' 
                });
                
                var newComment = 
                '<div class="comment-box">'+
                    '<div style="padding: 25px; background-color:white; margin-top:15px;"  class="comment">'+
                        '<div class="comment-inner clearfix">'+
                            '<div class="comment-info clearfix">'+
                                '<strong style="font-size: 20px; font-weight: 700; text-transform: capitalize; font-family: var(--font-family-Libre);">'+ response.user_name +'</strong>'+
                                '<div class="comment-time" style="font-size: 15px;color: var(--main-color);font-weight: 400;margin-top: 3px;">'+ currentTime  +'</div>'+
                            '</div>'+
                            '<div class="text" style="font-size: 22px; margin-top: 15px ;">'+ formData.get('text') +'</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                 document.getElementById('commentBox').insertAdjacentHTML('beforeend', newComment);
                 fetchCatComments(response.id);
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

