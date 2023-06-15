@extends('layouts.front.main')
@section('content')
<div class="container-fluid profile">
        <div class="container">
            <div class="row">
				<div class="profile-cover">
					<div class="camera-button">
						<div class="camera-icon"><i class="fa-solid fa-camera"></i></div>
						<div class="message-box">Change Cover Photo</div>
					</div>
					<div class="profile-picture">
						<div class="camera-icon">
							<i class="fa-solid fa-camera"></i>
						</div>
					</div>
				</div>
				<div class="profile-header-content">
					<div class="left"></div>
					<div class="right">
						<h3>Muhammad</h3>
						<p>@Muhammad • Joined Jun 2023 • Active now</p>
					</div>
				</div>
				<div class="profile-content-body">
					<div class="left">
						<ul>
							<li>Profile</i>
							<li>Nests</li>
							<li>Discussions</li>
							<li>Photos</li>
							<li>Email Invites</li>
						</ul>

					</div>
					<div class="right">
						
						<div class="top-content">
							<h6>Details</h6>  
							<button>Edit</button>
						</div> 
						<table>
							<tr><td>First Name</td><td>Muhammad</td></tr>
							<tr><td>Last Name</td><td>Ahmar</td></tr>
							<tr><td>Nickname</td><td>Ahm</td></tr>
						</table>
					</div>
				</div>

			</div>
		</div>
</div>
@endsection
