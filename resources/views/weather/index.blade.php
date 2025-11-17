@extends('layouts.app')

@section('title', 'MeteoFunes - El Clima de Funes, Santa Fe')

@section('content')
<!-- Hero Section with Current Weather -->
<section class="hero-section position-relative overflow-hidden">
    <div class="animated-background"></div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Current Weather Card -->
                <div class="card weather-card shadow-lg border-0 mb-4" id="currentWeatherCard">
                    <div class="card-body p-4 p-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-3">
                                    <i class="bi bi-geo-alt-fill text-primary me-2 fs-5"></i>
                                    <h2 class="mb-0 fw-bold" id="location">Funes, Santa Fe</h2>
                                </div>
                                <div class="weather-icon-large mb-3" id="weatherIconLarge">
                                    <i class="bi bi-cloud-sun-fill"></i>
                                </div>
                                <h1 class="display-1 fw-bold mb-0" id="temperature">
                                    <span class="loading-skeleton">--</span>°C
                                </h1>
                                <p class="text-muted fs-5 mb-0" id="condition">Cargando...</p>
                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="weather-detail-card">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-thermometer-half text-danger me-2"></i>
                                                <span class="text-muted small">Sensación</span>
                                            </div>
                                            <h4 class="mb-0" id="feelsLike">--°C</h4>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="weather-detail-card">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-droplet-fill text-info me-2"></i>
                                                <span class="text-muted small">Humedad</span>
                                            </div>
                                            <h4 class="mb-0" id="humidity">--%</h4>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="weather-detail-card">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-wind text-primary me-2"></i>
                                                <span class="text-muted small">Viento</span>
                                            </div>
                                            <h4 class="mb-0" id="windSpeed">-- km/h</h4>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="weather-detail-card">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-speedometer2 text-success me-2"></i>
                                                <span class="text-muted small">Presión</span>
                                            </div>
                                            <h4 class="mb-0" id="pressure">-- hPa</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 pt-3 border-top">
                            <div class="col-4 text-center">
                                <i class="bi bi-sunrise-fill text-warning fs-4"></i>
                                <p class="mb-0 mt-2 text-muted small">Amanecer</p>
                                <p class="mb-0 fw-bold" id="sunrise">--:--</p>
                            </div>
                            <div class="col-4 text-center">
                                <i class="bi bi-sunset-fill text-orange fs-4"></i>
                                <p class="mb-0 mt-2 text-muted small">Atardecer</p>
                                <p class="mb-0 fw-bold" id="sunset">--:--</p>
                            </div>
                            <div class="col-4 text-center">
                                <i class="bi bi-brightness-high-fill text-warning fs-4"></i>
                                <p class="mb-0 mt-2 text-muted small">Índice UV</p>
                                <p class="mb-0 fw-bold" id="uvIndex">--</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Forecast Section -->
<section class="py-5 bg-light" id="forecast">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">
                <i class="bi bi-calendar-week text-primary me-2"></i>
                Pronóstico Semanal
            </h2>
            <p class="text-muted">Planifica tu semana con nuestro pronóstico detallado</p>
        </div>
        <div class="row g-4" id="forecastContainer">
            <!-- Forecast cards will be loaded here -->
            <div class="col-12 text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando pronóstico...</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Info Section -->
<section class="py-5" id="about">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card info-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary bg-opacity-10 mx-auto mb-3">
                            <i class="bi bi-clock-history text-primary fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Actualización en Tiempo Real</h5>
                        <p class="text-muted mb-0">Información meteorológica actualizada cada hora para que estés siempre informado.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-success bg-opacity-10 mx-auto mb-3">
                            <i class="bi bi-graph-up-arrow text-success fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Datos Precisos</h5>
                        <p class="text-muted mb-0">Utilizamos las mejores fuentes de datos meteorológicos para Funes y alrededores.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-info bg-opacity-10 mx-auto mb-3">
                            <i class="bi bi-phone text-info fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">100% Responsive</h5>
                        <p class="text-muted mb-0">Accede desde cualquier dispositivo: computadora, tablet o smartphone.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
