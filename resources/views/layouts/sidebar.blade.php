<div class="sidebar d-flex flex-column flex-shrink-0">
  <div class="brand-container p-3">
    <a href="{{ route('dashboard.manager')}}" class="brand-link d-flex align-items-center text-decoration-none">
      <div class="brand-icon me-2">
        <i class="bi bi-layers-fill"></i>
      </div>
      <span class="brand-text">New-App</span>
    </a>
  </div>
  <hr class="sidebar-divider">
  
  <div class="nav-section px-3">
    <div class="nav-section-header">
      <span>Main Navigation</span>
    </div>
    <ul class="nav-menu nav flex-column">
      <li class="nav-item mb-2">
        <a href="{{ route('dashboard.manager')}}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <i class="bi bi-grid-1x2-fill me-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item mb-2">
        <a href="{{ route('alerte-rate.index') }}" class="nav-link {{ request()->routeIs('alerte-rate.index') ? 'active' : '' }}">
          <i class="bi bi-bell-fill me-2"></i>
          <span>Alerte Rates</span>
        </a>
      </li>
    </ul>
  </div>
  
  <div class="sidebar-footer">
    <hr class="sidebar-divider">
    <div class="logout-container px-3 pb-3">
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="logout-button">
          <i class="bi bi-box-arrow-right me-2"></i>
          <span>Logout</span>
        </button>
      </form>
    </div>
  </div>

  @if (session('success'))
    <div class="alert alert-success" role="alert">
      <div class="alert-icon">
        <i class="bi bi-check-circle-fill"></i>
      </div>
      <div class="alert-content">
        {{ session('success') }}
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if (session('error'))
    <div class="alert alert-danger" role="alert">
      <div class="alert-icon">
        <i class="bi bi-exclamation-triangle-fill"></i>
      </div>
      <div class="alert-content">
        {{ session('error') }}
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>

<style>
  :root {
    --primary-color: #3a86ff;
    --secondary-color: #4361ee;
    --accent-color: #4895ef;
    --sidebar-bg-start: #111827;
    --sidebar-bg-end: #1f2937;
    --sidebar-hover: rgba(255, 255, 255, 0.08);
    --sidebar-active-bg: rgba(58, 134, 255, 0.15);
    --sidebar-active-border: #3a86ff;
    --sidebar-text: #e5e7eb;
    --sidebar-muted: #9ca3af;
    --badge-bg: #4cc9f0;
    --success-bg: #10b981;
    --error-bg: #ef4444;
  }

  .sidebar {
    background: linear-gradient(180deg, var(--sidebar-bg-start) 0%, var(--sidebar-bg-end) 100%);
    min-height: 100vh;
    width: 280px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    transition: all 0.3s ease;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 100;
    display: flex;
    flex-direction: column;
    border-right: 1px solid rgba(255, 255, 255, 0.05);
  }

  /* Subtle pattern overlay */
  .sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.5;
    z-index: -1;
  }

  .brand-container {
    padding: 1.75rem 1.5rem;
  }

  .brand-link {
    color: white;
    transition: all 0.3s ease;
  }

  .brand-link:hover {
    opacity: 0.9;
  }

  .brand-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 12px;
    color: white;
    box-shadow: 0 8px 16px rgba(58, 134, 255, 0.25);
    position: relative;
    overflow: hidden;
  }

  /* Shine effect */
  .brand-icon::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
      to bottom right,
      rgba(255, 255, 255, 0) 0%,
      rgba(255, 255, 255, 0.1) 50%,
      rgba(255, 255, 255, 0) 100%
    );
    transform: rotate(30deg);
    animation: shine 3s infinite;
  }

  @keyframes shine {
    0% {
      transform: translateX(-100%) rotate(30deg);
    }
    20%, 100% {
      transform: translateX(100%) rotate(30deg);
    }
  }

  .brand-text {
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    letter-spacing: 0.5px;
    margin-left: 0.5rem;
  }

  .sidebar-divider {
    margin: 0.5rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.06);
    opacity: 1;
  }

  .nav-section {
    flex: 1;
    overflow-y: auto;
    padding: 0 1.5rem;
  }

  .nav-section-header {
    text-transform: uppercase;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    color: var(--sidebar-muted);
    margin-bottom: 1rem;
    padding-left: 0.75rem;
    opacity: 0.8;
  }

  .nav-menu {
    list-style: none;
    padding-left: 0;
    margin-bottom: 1.5rem;
  }

  .nav-item {
    margin-bottom: 0.5rem;
    position: relative;
  }

  .nav-link {
    display: flex;
    align-items: center;
    color: var(--sidebar-text);
    padding: 0.875rem 1rem;
    border-radius: 10px;
    transition: all 0.2s ease;
    font-weight: 500;
    position: relative;
    z-index: 1;
    border-left: 3px solid transparent;
  }

  .nav-link:hover {
    background-color: var(--sidebar-hover);
    color: white;
    transform: translateX(3px);
  }

  .nav-link.active {
    background-color: var(--sidebar-active-bg);
    color: white;
    font-weight: 600;
    border-left: 3px solid var(--sidebar-active-border);
  }

  .nav-link.active::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
      rgba(58, 134, 255, 0.1) 0%, 
      rgba(58, 134, 255, 0.05) 50%, 
      rgba(58, 134, 255, 0) 100%);
    border-radius: 10px;
    z-index: -1;
  }

  .nav-link i {
    font-size: 1.25rem;
    width: 24px;
    text-align: center;
    margin-right: 0.75rem;
    transition: all 0.2s ease;
  }

  .nav-link:hover i {
    transform: scale(1.1);
  }

  .badge {
    background-color: var(--badge-bg);
    color: #ffffff;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 0.35rem 0.65rem;
    border-radius: 6px;
    margin-left: auto;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .sidebar-footer {
    margin-top: auto;
    width: 100%;
    padding: 0 1.5rem;
  }

  .logout-container {
    width: 100%;
    padding-bottom: 1.5rem;
  }

  .logout-button {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 0.875rem 1rem;
    border: none;
    background-color: rgba(239, 68, 68, 0.1);
    color: #f87171;
    border-radius: 10px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .logout-button:hover {
    background-color: rgba(239, 68, 68, 0.15);
    color: #ef4444;
    transform: translateY(-2px);
  }

  .logout-button:active {
    transform: translateY(0);
  }

  .logout-button i {
    font-size: 1.25rem;
    margin-right: 0.75rem;
  }

  /* Alerts */
  .alert {
    display: flex;
    align-items: flex-start;
    padding: 1rem 1.25rem;
    margin: 1rem;
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    position: fixed;
    bottom: 1.5rem;
    left: 1.5rem;
    max-width: 350px;
    z-index: 1000;
    animation: slideInUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    backdrop-filter: blur(10px);
  }

  .alert-success {
    background-color: rgba(16, 185, 129, 0.15);
    border-left: 4px solid var(--success-bg);
    color: #ecfdf5;
  }

  .alert-danger {
    background-color: rgba(239, 68, 68, 0.15);
    border-left: 4px solid var(--error-bg);
    color: #fef2f2;
  }

  .alert-icon {
    flex-shrink: 0;
    margin-right: 0.75rem;
    font-size: 1.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .alert-success .alert-icon {
    color: var(--success-bg);
  }

  .alert-danger .alert-icon {
    color: var(--error-bg);
  }

  .alert-content {
    flex-grow: 1;
    font-weight: 500;
  }

  .btn-close {
    color: currentColor;
    opacity: 0.5;
    transition: opacity 0.2s;
    padding: 0.25rem;
    background: transparent;
    border: none;
    cursor: pointer;
    margin-left: 0.5rem;
  }

  .btn-close:hover {
    opacity: 1;
  }

  @keyframes slideInUp {
    from {
      transform: translateY(20px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  /* Add margin to main content to accommodate fixed sidebar */
  main {
    margin-left: 280px;
    transition: margin-left 0.3s ease;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .sidebar {
      width: 80px;
    }
    
    .brand-text,
    .nav-link span,
    .logout-button span,
    .nav-section-header {
      display: none;
    }
    
    .nav-link {
      justify-content: center;
      padding: 0.875rem;
      border-left: none;
    }
    
    .nav-link.active {
      border-left: none;
      border-left: none;
      border-radius: 10px;
    }
    
    .nav-link i {
      margin-right: 0;
      font-size: 1.4rem;
    }
    
    .badge {
      position: absolute;
      top: 5px;
      right: 5px;
      padding: 0.25rem 0.4rem;
      font-size: 0.65rem;
    }
    
    .brand-container {
      display: flex;
      justify-content: center;
      padding: 1.5rem 0;
    }
    
    .brand-icon {
      margin-right: 0;
    }
    
    .logout-button {
      justify-content: center;
    }
    
    .logout-button i {
      margin-right: 0;
    }
    
    .sidebar-divider {
      margin: 0.5rem 1rem;
    }
    
    .alert {
      left: 90px;
      max-width: 250px;
    }
    
    main {
      margin-left: 80px;
    }
  }
</style>