<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Dashboard - New App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3a86ff;
      --primary-dark: #2563eb;
      --primary-light: #60a5fa;
      --secondary-color: #4361ee;
      --accent-color: #4895ef;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --danger-color: #ef4444;
      --info-color: #6366f1;
      
      --bg-color: #f1f5f9;
      --card-bg: #ffffff;
      --header-bg: #ffffff;
      
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --text-muted: #94a3b8;
      --text-light: #f8fafc;
      
      --border-color: #e2e8f0;
      --border-radius: 16px;
      --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.02);
    }

    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background-color: var(--bg-color);
      color: var(--text-primary);
      line-height: 1.5;
    }

    /* Layout Structure */
    .dashboard-wrapper {
      display: flex;
    }

    .dashboard-content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin-left: 280px;
      transition: margin-left 0.3s ease;
    }

    /* Header Styles */
    .header {
      background-color: var(--header-bg);
      padding: 1rem 1.5rem;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: var(--shadow-sm);
      border-bottom: 1px solid var(--border-color);
    }

    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .page-title {
      font-weight: 700;
      font-size: 1.25rem;
      margin: 0;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-primary);
    }

    .page-title i {
      font-size: 1.5rem;
      color: var(--primary-color);
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .user-welcome {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-secondary);
    }

    .user-welcome strong {
      font-weight: 600;
      color: var(--text-primary);
    }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      color: white;
      box-shadow: var(--shadow-md);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .avatar::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 50%);
      border-radius: 50%;
    }

    .avatar:hover {
      transform: scale(1.05);
      box-shadow: var(--shadow-lg);
    }

    /* Main Content Area */
    .main-content {
      flex-grow: 1;
      padding: 1.5rem;
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      grid-template-rows: auto;
      gap: 1.5rem;
    }

    /* Alert Styles */
    .alert-container {
      grid-column: span 12;
    }

    .alert {
      border-radius: 12px;
      border: none;
      padding: 1rem 1.25rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: var(--shadow-md);
      margin-bottom: 0;
    }

    .alert-danger {
      background-color: rgba(239, 68, 68, 0.1);
      color: #b91c1c;
      border-left: 4px solid var(--danger-color);
    }

    .alert i {
      font-size: 1.25rem;
    }

    /* Welcome and Stats Section */
    .welcome-stats-container {
      grid-column: span 12;
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 1.5rem;
    }

    .welcome-card {
      grid-column: span 8;
      border-radius: var(--border-radius);
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      box-shadow: var(--shadow-md);
      overflow: hidden;
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .welcome-card::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 200px;
      height: 200px;
      background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
      opacity: 0.1;
      border-radius: 50%;
      transform: translate(30%, -30%);
    }

    .welcome-card::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 150px;
      height: 150px;
      background: linear-gradient(135deg, var(--secondary-color) 0%, var(--info-color) 100%);
      opacity: 0.1;
      border-radius: 50%;
      transform: translate(-30%, 30%);
    }

    .welcome-card .card-body {
      position: relative;
      z-index: 1;
      padding: 2rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .welcome-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .welcome-title i {
      font-size: 1.75rem;
      color: var(--primary-color);
      background: rgba(58, 134, 255, 0.1);
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
    }

    .welcome-text {
      font-size: 1rem;
      color: var(--text-secondary);
      line-height: 1.6;
    }

    .welcome-text strong {
      color: var(--primary-color);
      font-weight: 600;
    }

    /* Stats Cards */
    .stats-container {
      grid-column: span 4;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .stat-card {
      border-radius: var(--border-radius);
      background-color: var(--card-bg);
      box-shadow: var(--shadow-md);
      transition: all 0.3s ease;
      overflow: hidden;
      position: relative;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-lg);
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 6px;
      height: 100%;
      background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
      opacity: 0.8;
    }

    .stat-card:nth-child(2)::before {
      background: linear-gradient(to bottom, var(--info-color), var(--accent-color));
    }

    .stat-card .card-body {
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .stat-content {
      display: flex;
      align-items: center;
      gap: 1.25rem;
      margin-bottom: 1rem;
    }

    .stat-icon {
      width: 56px;
      height: 56px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.75rem;
      color: white;
      box-shadow: var(--shadow-md);
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .stat-card:nth-child(2) .stat-icon {
      background: linear-gradient(135deg, var(--info-color), var(--accent-color));
    }

    .stat-info {
      display: flex;
      flex-direction: column;
    }

    .stat-number {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-primary);
      line-height: 1.2;
    }

    .stat-label {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-secondary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .btn-details {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border: none;
      border-radius: 12px;
      padding: 0.75rem 1.25rem;
      font-weight: 600;
      font-size: 0.875rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
      width: 100%;
      margin-top: auto;
    }

    .stat-card:nth-child(2) .btn-details {
      background: linear-gradient(135deg, var(--info-color), var(--accent-color));
    }

    .btn-details:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
      color: white;
    }

    .btn-details:active {
      transform: translateY(0);
    }

    /* Chart Layout */
    .chart-layout {
      grid-column: span 12;
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 1.5rem;
    }

    .chart-section-header {
      grid-column: span 12;
      display: flex;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    .section-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text-primary);
      margin: 0;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      position: relative;
    }

    .section-title i {
      font-size: 1.5rem;
      color: var(--primary-color);
    }

    .section-line {
      flex-grow: 1;
      height: 1px;
      background: linear-gradient(to right, var(--border-color) 0%, rgba(226, 232, 240, 0.1) 100%);
      margin-left: 1.5rem;
    }

    /* Chart Cards */
    .chart-card {
      border-radius: var(--border-radius);
      background-color: var(--card-bg);
      box-shadow: var(--shadow-md);
      transition: all 0.3s ease;
      overflow: hidden;
      height: 100%;
    }

    .chart-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-lg);
    }

    .chart-header {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .chart-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
    }

    .chart-icon {
      font-size: 1.25rem;
      color: var(--primary-color);
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(58, 134, 255, 0.1);
      border-radius: 8px;
    }

    .chart-container {
      padding: 1.5rem;
      position: relative;
      height: 350px;
    }

    .pie-chart-card {
      grid-column: span 4;
    }

    .bar-chart-card {
      grid-column: span 8;
    }

    .line-chart-card {
      grid-column: span 12;
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .welcome-card, .stat-card, .chart-card {
      animation: fadeInUp 0.5s ease-out forwards;
    }

    .stat-card:nth-child(2) {
      animation-delay: 0.1s;
    }

    .pie-chart-card {
      animation-delay: 0.2s;
    }

    .bar-chart-card {
      animation-delay: 0.3s;
    }

    .line-chart-card {
      animation-delay: 0.4s;
    }

    /* Responsive Adjustments - Matching previous behavior */
    @media (max-width: 768px) {
      .dashboard-content {
        margin-left: 80px;
      }
      
      .welcome-stats-container {
        grid-template-columns: 1fr;
      }
      
      .welcome-card {
        grid-column: span 12;
      }
      
      .stats-container {
        grid-column: span 12;
        flex-direction: row;
      }
      
      .stat-card {
        flex: 1;
      }
      
      .pie-chart-card {
        grid-column: span 12;
      }
      
      .bar-chart-card {
        grid-column: span 12;
      }
      
      .welcome-title {
        font-size: 1.25rem;
      }
      
      .welcome-title i {
        width: 40px;
        height: 40px;
        font-size: 1.5rem;
      }
      
      .stat-icon {
        width: 48px;
        height: 48px;
        font-size: 1.5rem;
      }
      
      .stat-number {
        font-size: 1.5rem;
      }
      
      .btn-details {
        padding: 0.5rem 1rem;
      }
    }

    @media (max-width: 576px) {
      .user-welcome {
        display: none;
      }
      
      .welcome-card .card-body {
        padding: 1.5rem;
      }
      
      .stats-container {
        flex-direction: column;
      }
      
      .chart-container {
        height: 300px;
      }
      
      .main-content {
        padding: 1rem;
        gap: 1rem;
      }
      
      .welcome-stats-container,
      .chart-layout {
        gap: 1rem;
      }
    }
  </style>
</head>

<body>
  <div class="dashboard-wrapper">
    @include('layouts.sidebar')

    <div class="dashboard-content">
      <header class="header">
        <div class="header-content">
          <h1 class="page-title">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
          </h1>
          <div class="user-info">
            <span class="user-welcome d-none d-md-inline">Welcome back, <strong>{{ session('username', 'Manager') }}</strong></span>
            <div class="avatar">
              <i class="bi bi-person-fill"></i>
            </div>
          </div>
        </div>
      </header>
      
      <div class="main-content">
        <!-- Alert -->
        @if(isset($error))
          <div class="alert-container">
            <div class="alert alert-danger" role="alert">
              <i class="bi bi-exclamation-triangle-fill"></i>
              <div>{{ $error }}</div>
            </div>
          </div>
        @endif

        <!-- Welcome and Stats Section -->
        <div class="welcome-stats-container">
          <!-- Welcome Card -->
          <div class="welcome-card">
            <div class="card-body">
              <h2 class="welcome-title">
                <i class="bi bi-stars"></i>
                Welcome to Your Dashboard
              </h2>
              <p class="welcome-text">
                Hello, <strong>{{ session('username', 'Manager') }}</strong>! This is your control center for managing all aspects of your business. Use the sidebar navigation to access different sections of the application.
              </p>
            </div>
          </div>
          
          <!-- Stats Container -->
          <div class="stats-container">
            <!-- Active Tickets Stat -->
            <div class="stat-card">
              <div class="card-body">
                <div class="stat-content">
                  <div class="stat-icon">
                    <i class="bi bi-ticket-perforated-fill"></i>
                  </div>
                  <div class="stat-info">
                    <div class="stat-number">{{ $totalTickets }}</div>
                    <div class="stat-label">Active Tickets</div>
                  </div>
                </div>
                <a href="{{ route('dashboard.tickets') }}" class="btn btn-details">
                  <span>View Details</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            
            <!-- Potential Leads Stat -->
            <div class="stat-card">
              <div class="card-body">
                <div class="stat-content">
                  <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="stat-info">
                    <div class="stat-number">{{ $totalLeads }}</div>
                    <div class="stat-label">Potential Leads</div>
                  </div>
                </div>
                <a href="{{ route('dashboard.leads') }}" class="btn btn-details">
                  <span>View Details</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Analytics Section -->
        <div class="chart-layout">
          <div class="chart-section-header">
            <h2 class="section-title">
              <i class="bi bi-bar-chart-line-fill"></i>
              Analytics
            </h2>
            <div class="section-line"></div>
          </div>

          <!-- Ticket Status Chart -->
          <div class="pie-chart-card chart-card">
            <div class="chart-header">
              <div class="chart-icon">
                <i class="bi bi-pie-chart-fill"></i>
              </div>
              <h3 class="chart-title">Ticket Status</h3>
            </div>
            <div class="chart-container">
              <canvas id="ticketStatusChart"></canvas>
            </div>
          </div>

          <!-- Monthly Expenses Chart -->
          <div class="bar-chart-card chart-card">
            <div class="chart-header">
              <div class="chart-icon">
                <i class="bi bi-bar-chart-fill"></i>
              </div>
              <h3 class="chart-title">Monthly Expenses</h3>
            </div>
            <div class="chart-container">
              <canvas id="monthlyExpensesChart"></canvas>
            </div>
          </div>

          <!-- Budget Evolution Chart -->
          <div class="line-chart-card chart-card">
            <div class="chart-header">
              <div class="chart-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <h3 class="chart-title">Budget Evolution</h3>
            </div>
            <div class="chart-container">
              <canvas id="budgetEvolutionChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Get token from wherever it's stored (example: localStorage)
    const token = localStorage.getItem('auth_token') || '{{ session('token') }}';
    console.log('Token being used:', token);

    // Base fetch configuration with headers
    const fetchConfig = {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      credentials: 'include',
      mode: 'cors'
    };

    // Function to format status text for display
    function formatStatus(status) {
      return status.split('-')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
    }

    // Function to generate colors with better contrast
    function generateColors(count) {
      const colors = [
        '#3a86ff', '#4361ee', '#3a0ca3', '#7209b7', '#f72585', 
        '#4cc9f0', '#480ca8', '#4895ef', '#560bad', '#b5179e'
      ];

      while (colors.length < count) {
        const r = Math.floor(Math.random() * 200);
        const g = Math.floor(Math.random() * 200);
        const b = Math.floor(Math.random() * 200);
        colors.push(`rgba(${r}, ${g}, ${b}, 0.8)`);
      }

      return colors.slice(0, count);
    }

    // Format date for display (YYYY-MM to Mon YYYY)
    function formatDateLabel(dateStr) {
      const [year, month] = dateStr.split('-');
      const date = new Date(year, month - 1);
      return date.toLocaleString('en-US', { month: 'short', year: 'numeric' });
    }

    document.addEventListener('DOMContentLoaded', function() {
      // Helper function to handle fetch with better error reporting
      async function fetchData(url) {
        try {
          const response = await fetch(url, fetchConfig);
          if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`HTTP error! status: ${response.status}, message: ${errorText}`);
          }
          return await response.json();
        } catch (error) {
          console.error(`Fetch failed for ${url}:`, error);
          throw error;
        }
      }

      // Chart.js global defaults
      Chart.defaults.font.family = "'Plus Jakarta Sans', 'Segoe UI', sans-serif";
      Chart.defaults.font.size = 13;
      Chart.defaults.color = '#64748b';
      Chart.defaults.plugins.tooltip.padding = 12;
      Chart.defaults.plugins.tooltip.cornerRadius = 8;
      Chart.defaults.plugins.tooltip.titleFont = { weight: '600', size: 14 };
      Chart.defaults.plugins.tooltip.bodyFont = { size: 13 };
      Chart.defaults.plugins.legend.labels.padding = 16;
      Chart.defaults.plugins.legend.labels.boxWidth = 12;
      Chart.defaults.plugins.legend.labels.boxHeight = 12;

      // TICKET STATUS PIE CHART
      fetchData('http://localhost:8080/api/dashboard/ticket-status')
        .then(data => {
          const labels = data.map(item => formatStatus(item.status));
          const values = data.map(item => item.count);
          const colors = generateColors(data.length);

          new Chart(document.getElementById('ticketStatusChart'), {
            type: 'doughnut',
            data: {
              labels: labels,
              datasets: [{ 
                data: values, 
                backgroundColor: colors, 
                borderWidth: 2,
                borderColor: '#ffffff',
                hoverOffset: 10
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              cutout: '65%',
              plugins: {
                legend: { 
                  position: 'right', 
                  labels: { 
                    padding: 20, 
                    boxWidth: 15, 
                    font: { size: 12, weight: '500' } 
                  } 
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      const label = context.label || '';
                      const value = context.raw || 0;
                      const total = context.dataset.data.reduce((acc, cur) => acc + cur, 0);
                      const percentage = Math.round((value / total) * 100);
                      return `${label}: ${value} (${percentage}%)`;
                    }
                  }
                }
              }
            }
          });
        })
        .catch(error => console.error('Error fetching ticket status data:', error));

      // MONTHLY EXPENSES BAR CHART
      fetchData('http://localhost:8080/api/dashboard/monthly-expenses')
        .then(data => {
          const labels = data.map(item => formatDateLabel(item.month));
          const values = data.map(item => item.totalAmount);

          new Chart(document.getElementById('monthlyExpensesChart'), {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Total Expenses',
                data: values,
                backgroundColor: 'rgba(58, 134, 255, 0.8)',
                borderColor: '#3a86ff',
                borderWidth: 1,
                borderRadius: 6,
                hoverBackgroundColor: 'rgba(58, 134, 255, 1)'
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                y: {
                  beginAtZero: true,
                  grid: {
                    color: 'rgba(226, 232, 240, 0.5)',
                    drawBorder: false
                  },
                  ticks: { 
                    callback: value => '$' + value.toLocaleString(),
                    font: { weight: '500' }
                  }
                },
                x: {
                  grid: {
                    display: false,
                    drawBorder: false
                  },
                  ticks: { font: { weight: '500' } }
                }
              },
              plugins: {
                legend: { display: false },
                tooltip: { 
                  callbacks: { 
                    label: context => 'Expenses: $' + context.raw.toLocaleString() 
                  } 
                }
              }
            }
          });
        })
        .catch(error => console.error('Error fetching monthly expenses data:', error));

      // BUDGET EVOLUTION LINE CHART
      Promise.all([
        fetchData('http://localhost:8080/api/dashboard/budget-evolution'),
        fetchData('http://localhost:8080/api/dashboard/monthly-expenses')
      ])
        .then(([budgetData, expensesData]) => {
          const expensesByMonth = {};
          expensesData.forEach(item => expensesByMonth[item.month] = item.totalAmount);

          const labels = budgetData.map(item => formatDateLabel(item.date));
          const budgetValues = budgetData.map(item => item.totalBudget);
          const expenseValues = budgetData.map(item => expensesByMonth[item.date] || 0);
          const remainingValues = budgetData.map((item, index) => Math.max(0, item.totalBudget - (expensesByMonth[item.date] || 0)));

          new Chart(document.getElementById('budgetEvolutionChart'), {
            type: 'line',
            data: {
              labels: labels,
              datasets: [
                {
                  label: 'Total Budget',
                  data: budgetValues,
                  borderColor: '#3a86ff',
                  backgroundColor: 'rgba(58, 134, 255, 0.1)',
                  borderWidth: 3,
                  fill: true,
                  tension: 0.3,
                  pointBackgroundColor: '#ffffff',
                  pointBorderColor: '#3a86ff',
                  pointBorderWidth: 2,
                  pointRadius: 4,
                  pointHoverRadius: 6
                },
                {
                  label: 'Expenses',
                  data: expenseValues,
                  borderColor: '#ef4444',
                  backgroundColor: 'rgba(239, 68, 68, 0.1)',
                  borderWidth: 3,
                  fill: true,
                  tension: 0.3,
                  pointBackgroundColor: '#ffffff',
                  pointBorderColor: '#ef4444',
                  pointBorderWidth: 2,
                  pointRadius: 4,
                  pointHoverRadius: 6
                },
                {
                  label: 'Remaining Budget',
                  data: remainingValues,
                  borderColor: '#10b981',
                  backgroundColor: 'rgba(16, 185, 129, 0.1)',
                  borderWidth: 3,
                  fill: true,
                  tension: 0.3,
                  pointBackgroundColor: '#ffffff',
                  pointBorderColor: '#10b981',
                  pointBorderWidth: 2,
                  pointRadius: 4,
                  pointHoverRadius: 6
                }
              ]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                y: { 
                  beginAtZero: true, 
                  grid: {
                    color: 'rgba(226, 232, 240, 0.5)',
                    drawBorder: false
                  },
                  ticks: { 
                    callback: value => '$' + value.toLocaleString(),
                    font: { weight: '500' }
                  }
                },
                x: {
                  grid: {
                    display: false,
                    drawBorder: false
                  },
                  ticks: { font: { weight: '500' } }
                }
              },
              plugins: {
                tooltip: { 
                  callbacks: { 
                    label: context => context.dataset.label + ': $' + context.raw.toLocaleString() 
                  } 
                }
              }
            }
          });
        })
        .catch(error => console.error('Error fetching budget evolution data:', error));
    });
  </script>
</body>
</html>