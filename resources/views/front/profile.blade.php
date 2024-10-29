@extends('layouts.front.main')
@section('content')
@auth
<div class="container-fluid profile">
        <div class="container"></br></br></br>
            <div class="row">
				<div class="avatar-container">
					<div class="avatar-container">
						
					</div>
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div id="profile-picture" class="profile-picture" style="background-image: url('{{ asset($filePath) }}');">
                            <div class="camera-icon">
                                <i class="fa-solid fa-camera" id="camera-icon"></i>
                                <input type="file" name="image" id="image" style="display: none;">
                            </div>
                        </div>
                    </form>


				</div>
				<div class="profile-header-content">
					<div class="left"></div>
					<div class="right">
						<h3>{{Auth()->user()->name}}</h3>
						<p>{{Auth()->user()->email}} • Joined {{ \Carbon\Carbon::parse(Auth()->user()->created_at)->format('F Y') }}• Active now</p>
					</div>
				</div>
				<div class="profile-content-body">
					<div class="left">
						{{-- <ul>
							<li>Profile</i>
							<li>Nests</li>
							<li>Discussions</li>
							<li>Photos</li>
							<li>Email Invites</li>
						</ul> --}}

					</div>
					<div class="right">

						<div class="top-content">
							<h6>Details</h6>
							<a href="{{url('editProfile')}}"><button>Edit</button></a>
						</div>
						<table>
							<tr><td>First Name</td><td>{{Auth()->user()->name}}</td></tr>
							<tr><td>E-mail</td><td>{{Auth()->user()->email}}</td></tr>
						</table>
					</div>
				</div>

			</div>
		</div>
</div>
@else
    <div class="else">
        You Must Login First
    </div>
@endauth

<script>
document.getElementById('image').addEventListener('change', function() {
    var formData = new FormData(document.getElementById('uploadForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/upload', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Image uploaded successfully.');
            Swal.fire({
                title: 'Success',
                text: 'Image uploaded successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            location.reload();
        } else {
            console.error('Image upload failed.');
        }
    };

    xhr.onerror = function() {
        console.error('Image upload failed:', xhr.statusText);
    };

    xhr.send(formData);
});



    document.getElementById('camera-icon').addEventListener('click', function() {
    document.getElementById('image').click();
});


$(document).ready(function() {
    // Send an AJAX request to fetch the profile picture
    $.ajax({
        url: '{{ route("profile") }}',
        type: 'GET',
        success: function(response) {
            // Update the background image of the profile picture element
            $('#profile-picture').css('background-image', 'url(' + response.filePath + ')');
        },
        error: function() {
            alert('Error occurred while fetching the profile picture.');
        }
    });
});


</script>

@endsection
