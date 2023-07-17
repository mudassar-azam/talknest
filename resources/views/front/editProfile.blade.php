@extends('layouts.front.main')
@section('content')
<div class="container-fluid profile">
            <div class="row">
				<div class="edit-profile-header-content">
					<h3>Edit Profile</h3>
					<a href="{{ url('profile') }}"><button><i class="fa-regular fa-user"></i> View My Profile</button></a>
				</div>

				<div class="edit-profile-body">
					<div class="left">
						<ul>
							<li><i class="fa-regular fa-pen-to-square"></i> Edit</i>
							<li><i class="fa-regular fa-address-book"></i> Profile Photo</li>
							<li><i class="fa-regular fa-image"></i> Cover Photo</li>
						</ul>

					</div>
					<div class="right">

						<div class="top-content">
							<h4>Edit "Details" Information</h4>
						</div>
                        <form method="POST" action="{{ url('update') }}" enctype="multipart/form-data">
                            @csrf
                            <table>
                                <tr>
                                    <td>First Name (required)</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="name" value="{{ Auth()->user()->name }}" /></td>
                                </tr>
                                <tr>
                                    <td>Password (required)</td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="password" value="" /></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password (required)</td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="password_confirmation" value="" /></td>
                                </tr>
                                <tr>
                                    <td><button type="submit">Save Changes</button></td>
                                </tr>
                            </table>
                        </form>

					</div>
				</div>

			</div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
