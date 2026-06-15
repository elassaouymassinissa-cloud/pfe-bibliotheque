@extends('layouts.main_layout')

@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1 style="color: #44b89d";>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}" style="color: black";>Home</a></li>
      <li class="breadcrumb-item active" style="color: black";>Dashboard</li>
  
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard" style="margin-bottom: 300px;">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">

          

            <div class="card-body">
              <h5 class="card-title">Total <span>| Books</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$totalBooks}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">



            <div class="card-body">
              <h5 class="card-title">Total <span>| Users</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>

                </div>
                <div class="ps-3">
                  <h6>{{$totalUsers}}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-3 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Total <span>| Categories</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-diagram-3-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$totalCategories}}</h6>

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

         <!-- Customers Card -->
         <div class="col-xxl-3 col-xl-12">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Borrowed <span>| Books</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-download"></i>
      </div>
      <div class="ps-3">
        <h6>{{$totalBorrowedBooks ?? 0}}</h6>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->

</div>
 </div><!-- End Left side columns -->

</div>

  
<!--cyrcle-->
<div class="container">
    <canvas id="statsPieChart"  width="450" height="450" style="margin:auto"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statsPieChart').getContext('2d');

    const data = {
        labels: [
            'Livres Empruntés',
            'Livres Disponibles',
            'Livres en Retard'
        ],
        datasets: [{
            label: 'Statistiques Bibliothèque',
            data: [
                {{ $totalBorrowedBooks }},
                {{ $totalAvailableBooks }},
                {{ $totalretardBooks }}
            ],
            backgroundColor: [
                'rgba(8, 54, 217, 0.7)',    // bleu
                'rgba(15, 144, 15, 0.9)',    // vert
                'hsla(0, 90.30%, 55.50%, 0.70)'     // rouge
            ],
            borderColor: [
                'rgba(8, 54, 217, 0.7)',
                'rgba(15, 144, 15, 0.9)',
                'hsla(0, 90.30%, 55.50%, 0.70)'
            ],
            borderWidth: 1.5
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    enabled: true
                }
            }
        },
    };

    const statsPieChart = new Chart(ctx, config);
</script>
  <!--endcyrcle-->
  
  
</section>

</main>
@endsection