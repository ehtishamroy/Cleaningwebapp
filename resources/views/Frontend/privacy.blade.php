@extends('Frontend.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center  mb-4 fw-bold">Privacy Policy</h2>
                    
                    <p class="text-muted text-center">
                        Your privacy is important to us. This policy outlines how we collect, use, and protect your personal information.
                    </p>

                    <hr>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-user-secret text-primary"></i> 1. Information We Collect</h4>
                        <p class="text-muted">We collect personal information such as name, email, and usage data when you interact with our services.</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-lock text-warning"></i> 2. How We Use Your Information</h4>
                        <p class="text-muted">Your data is used to improve our services, provide customer support, and enhance user experience.</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-share-alt text-danger"></i> 3. Data Sharing</h4>
                        <p class="text-muted">We do not sell your personal information. However, we may share it with trusted third parties for service enhancements.</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-shield-alt text-success"></i> 4. Data Security</h4>
                        <p class="text-muted">We implement industry-standard security measures to protect your data from unauthorized access.</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-sync-alt text-info"></i> 5. Changes to This Policy</h4>
                        <p class="text-muted">We may update this policy from time to time. Any changes will be posted on this page.</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-semibold"><i class="fas fa-envelope text-primary"></i> 6. Contact Us</h4>
                        <p class="text-muted">If you have any questions about our privacy policy, feel free to contact us.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
