<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Hello {{$user->fname}}</h3>
        </div>
        <div class="card-body">
            <p>
                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your account details.</a> and <br>
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">change your password</a>
            </p>
        </div>
    </div>
</div>

@include('profile.partials.update-password-form')