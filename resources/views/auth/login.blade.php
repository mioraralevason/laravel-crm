<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - New App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3a86ff;
      --secondary-color: #4361ee;
      --accent-color: #4895ef;
      --light-color: #f8f9fa;
      --dark-color: #212529;
      --success-color: #4cc9f0;
      --warning-color: #f72585;
      --info-color: #560bad;
      --surface-color: #ffffff;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --border-color: #e2e8f0;
    }
    
    body {
      font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f0f4f8;
      padding: 2rem 1rem;
      position: relative;
      overflow: hidden;
    }
    
    /* Vendor frame 1 - Left side decorative element */
    .vendor-frame-1 {
      position: fixed;
      top: 0;
      left: 0;
      width: 30%;
      height: 100%;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      clip-path: polygon(0 0, 100% 0, 70% 100%, 0 100%);
      z-index: -1;
    }
    
    .vendor-frame-1::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
      opacity: 0.5;
    }
    
    /* Vendor frame 2 - Right side decorative element */
    .vendor-frame-2 {
      position: fixed;
      top: 0;
      right: 0;
      width: 40%;
      height: 100%;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      clip-path: polygon(30% 0, 100% 0, 100% 100%, 60% 100%);
      z-index: -1;
      border-left: 1px solid rgba(0,0,0,0.05);
    }
    
    .vendor-frame-2::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url("data:image/svg+xml,%3Csvg width='84' height='48' viewBox='0 0 84 48' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h12v6H0V0zm28 8h12v6H28V8zm14-8h12v6H42V0zm14 0h12v6H56V0zm0 8h12v6H56V8zM42 8h12v6H42V8zm0 16h12v6H42v-6zm14-8h12v6H56v-6zm14 0h12v6H70v-6zm0-16h12v6H70V0zM28 32h12v6H28v-6zM14 16h12v6H14v-6zM0 24h12v6H0v-6zm0 8h12v6H0v-6zm14 0h12v6H14v-6zm14 8h12v6H28v-6zm-14 0h12v6H14v-6zm28 0h12v6H42v-6zm14-8h12v6H56v-6zm0-8h12v6H56v-6zm14 8h12v6H70v-6zm0 8h12v6H70v-6zM14 24h12v6H14v-6zm14-8h12v6H28v-6zM14 8h12v6H14V8zM0 8h12v6H0V8z' fill='%233a86ff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    }
    
    .login-container {
      width: 100%;
      max-width: 450px;
      position: relative;
      z-index: 10;
    }
    
    .card {
      border: none;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      background-color: white;
      animation: fadeIn 0.6s ease-out;
      position: relative;
    }
    
    /* Card border effect */
    .card::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 16px; 
      padding: 2px; 
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); 
      mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      pointer-events: none;
    }
    
    .card-header {
      background: white;
      color: var(--text-primary);
      text-align: center;
      padding: 2.5rem 0 1.5rem;
      border-bottom: none;
    }
    
    .app-logo {
      margin-bottom: 1.5rem;
    }
    
    .logo-circle {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
      position: relative;
    }
    
    .logo-circle::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 50%;
      border: 2px solid rgba(255, 255, 255, 0.3);
      transform: scale(1.1);
    }
    
    .logo-icon {
      font-size: 2.5rem;
      color: white;
    }
    
    .app-name {
      font-size: 2rem;
      font-weight: 700;
      margin: 0;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      color: transparent;
    }
    
    .login-subtitle {
      font-size: 1rem;
      color: var(--text-secondary);
      margin-top: 0.5rem;
      font-weight: 400;
    }
    
    .card-body {
      padding: 1.5rem 2.5rem 2.5rem;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }
    
    .form-control {
      height: 52px;
      border-radius: 12px;
      border: 2px solid var(--border-color);
      padding-left: 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      color: var(--text-primary);
      background-color: #f8fafc;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(58, 134, 255, 0.1);
      background-color: white;
    }
    
    .input-group-text {
      background-color: #f8fafc;
      border: 2px solid var(--border-color);
      border-right: none;
      border-top-left-radius: 12px;
      border-bottom-left-radius: 12px;
      color: var(--text-secondary);
      padding-left: 1.25rem;
    }
    
    .input-group .form-control {
      border-left: none;
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    
    .form-control.is-invalid,
    .was-validated .form-control:invalid {
      border-color: var(--warning-color);
      background-image: none;
    }
    
    .text-danger {
      color: var(--warning-color) !important;
      font-size: 0.85rem;
      font-weight: 500;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      border: none;
      border-radius: 12px;
      height: 52px;
      font-weight: 600;
      letter-spacing: 0.5px;
      box-shadow: 0 8px 16px rgba(58, 134, 255, 0.2);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
      transition: all 0.6s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 20px rgba(58, 134, 255, 0.25);
    }
    
    .btn-primary:hover::before {
      left: 100%;
    }
    
    .btn-primary:active {
      transform: translateY(0);
    }
    
    .alert {
      border-radius: 12px;
      border: none;
      animation: shake 0.5s ease-in-out;
      padding: 1rem;
      display: flex;
      align-items: center;
      box-shadow: 0 4px 12px rgba(247, 37, 133, 0.1);
    }
    
    .alert-danger {
      background-color: #fff5f7;
      color: #be123c;
      border-left: 4px solid var(--warning-color);
    }
    
    /* Remember me and forgot password */
    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }
    
    .form-check-input {
      width: 1.1em;
      height: 1.1em;
      margin-top: 0.2em;
      border-radius: 0.25em;
      border: 2px solid var(--border-color);
    }
    
    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .form-check-label {
      font-size: 0.95rem;
      color: var(--text-secondary);
      font-weight: 500;
    }
    
    .forgot-password {
      color: var(--primary-color);
      font-size: 0.95rem;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease;
    }
    
    .forgot-password:hover {
      color: var(--secondary-color);
      text-decoration: underline;
    }
    
    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .vendor-frame-1 {
        width: 50%;
        clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);
      }
      
      .vendor-frame-2 {
        display: none;
      }
    }
    
    @media (max-width: 576px) {
      .card-body {
        padding: 1.5rem;
      }
      
      .app-name {
        font-size: 1.75rem;
      }
      
      .logo-circle {
        width: 75px;
        height: 75px;
      }
      
      .logo-icon {
        font-size: 2.25rem;
      }
      
      .form-control, .btn-primary {
        height: 48px;
      }
      
      .vendor-frame-1 {
        width: 70%;
      }
    }
  </style>
</head>
<body>
  <!-- Vendor frames -->
  <div class="vendor-frame-1"></div>
  <div class="vendor-frame-2"></div>
  
  <div class="login-container">
    <div class="card">
      <div class="card-header">
        <div class="app-logo">
          <div class="logo-circle">
            <i class="bi bi-layers-fill logo-icon"></i>
          </div>
        </div>
        <h1 class="app-name">New-App</h1>
        <p class="login-subtitle">Manager Portal</p>
      </div>
      <div class="card-body">
        @if ($errors->has('auth'))
          <div class="alert alert-danger mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>{{ $errors->first('auth') }}</div>
          </div>
        @endif

        <form action="{{ route('login') }}" method="post" id="loginForm">
          @csrf
          <div class="mb-4">
            <label for="username" class="form-label">Username or Email</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
              </span>
              <input
                type="text"
                id="username"
                name="username"
                class="form-control @error('username') is-invalid @enderror"
                placeholder="Enter your username or email"
                value="{{ old('username') }}"
                required
                autocomplete="username"
                autofocus
              >
            </div>
            @error('username')
              <div class="text-danger mt-2">
                <i class="bi bi-info-circle-fill me-1"></i>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-shield-lock-fill"></i>
              </span>
              <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password"
                required
                autocomplete="current-password"
              >
            </div>
            @error('password')
              <div class="text-danger mt-2">
                <i class="bi bi-info-circle-fill me-1"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="form-footer">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            
          </div>

          <button
            type="submit"
            class="btn btn-primary w-100"
            id="submitButton"
          >
            <span id="spinner" class="spinner-border spinner-border-sm me-2 d-none" role="status"></span>
            <span id="buttonText">Sign In</span>
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function () {
      const submitButton = document.getElementById('submitButton');
      const spinner = document.getElementById('spinner');
      const buttonText = document.getElementById('buttonText');

      submitButton.disabled = true;
      spinner.classList.remove('d-none');
      buttonText.textContent = 'Signing in...';
    });
  </script>
</body>
</html>