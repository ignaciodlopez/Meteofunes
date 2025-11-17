import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'bootstrap';
import * as bootstrap from 'bootstrap';

/**
 * MeteoFunes - Weather Application JavaScript
 */

// Weather API endpoints
const API_ENDPOINTS = {
    current: '/api/weather/current',
    forecast: '/api/weather/forecast'
};

// Update interval (5 minutes)
const UPDATE_INTERVAL = 300000;

/**
 * Initialize the application
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('MeteoFunes inicializado');
    loadCurrentWeather();
    loadForecast();
    
    // Set up auto-refresh
    setInterval(() => {
        loadCurrentWeather();
        loadForecast();
    }, UPDATE_INTERVAL);
});

/**
 * Load current weather data
 */
async function loadCurrentWeather() {
    try {
        const response = await fetch(API_ENDPOINTS.current);
        const data = await response.json();
        
        updateCurrentWeather(data);
    } catch (error) {
        console.error('Error loading current weather:', error);
        showError('No se pudo cargar el clima actual');
    }
}

/**
 * Update current weather display
 */
function updateCurrentWeather(data) {
    // Update main temperature
    document.getElementById('temperature').innerHTML = `${data.temperature}°C`;
    document.getElementById('condition').textContent = getConditionText(data.condition);
    
    // Update weather icon
    const iconElement = document.querySelector('#weatherIconLarge i');
    iconElement.className = `bi ${data.icon}`;
    
    // Update details
    document.getElementById('feelsLike').textContent = `${data.feels_like}°C`;
    document.getElementById('humidity').textContent = `${data.humidity}%`;
    document.getElementById('windSpeed').textContent = `${data.wind_speed} km/h ${data.wind_direction}`;
    document.getElementById('pressure').textContent = `${data.pressure} hPa`;
    
    // Update sun times
    document.getElementById('sunrise').textContent = data.sunrise;
    document.getElementById('sunset').textContent = data.sunset;
    document.getElementById('uvIndex').textContent = data.uv_index;
    
    // Add animation to card
    const card = document.getElementById('currentWeatherCard');
    card.style.animation = 'none';
    setTimeout(() => {
        card.style.animation = 'fadeIn 0.5s ease';
    }, 10);
}

/**
 * Load forecast data
 */
async function loadForecast() {
    try {
        const response = await fetch(API_ENDPOINTS.forecast);
        const data = await response.json();
        
        displayForecast(data);
    } catch (error) {
        console.error('Error loading forecast:', error);
        showError('No se pudo cargar el pronóstico');
    }
}

/**
 * Display forecast cards
 */
function displayForecast(forecastData) {
    const container = document.getElementById('forecastContainer');
    
    let html = '';
    forecastData.forEach((day, index) => {
        html += `
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card forecast-card" style="animation-delay: ${index * 0.1}s">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-2">${day.day}</h5>
                        <p class="text-muted small mb-3">${day.date}</p>
                        <div class="forecast-icon">
                            <i class="bi ${day.icon}" style="color: ${getConditionColor(day.condition)}"></i>
                        </div>
                        <div class="temp-display mb-2">
                            ${day.temp_max}°
                        </div>
                        <div class="temp-range mb-3">
                            Min: ${day.temp_min}°
                        </div>
                        <div class="d-flex justify-content-around align-items-center mt-3 pt-3 border-top">
                            <div>
                                <i class="bi bi-droplet-fill text-info"></i>
                                <small class="d-block">${day.rain_probability}%</small>
                            </div>
                            <div>
                                <i class="bi bi-moisture text-primary"></i>
                                <small class="d-block">${day.humidity}%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

/**
 * Get condition text in Spanish
 */
function getConditionText(condition) {
    const conditions = {
        'sunny': 'Soleado',
        'cloudy': 'Nublado',
        'partly_cloudy': 'Parcialmente nublado',
        'rainy': 'Lluvioso',
        'stormy': 'Tormentoso',
        'windy': 'Ventoso'
    };
    
    return conditions[condition] || 'Desconocido';
}

/**
 * Get color for weather condition
 */
function getConditionColor(condition) {
    const colors = {
        'sunny': '#ffd700',
        'cloudy': '#9ca3af',
        'partly_cloudy': '#60a5fa',
        'rainy': '#3b82f6',
        'stormy': '#6366f1',
        'windy': '#8b5cf6'
    };
    
    return colors[condition] || '#667eea';
}

/**
 * Show error message
 */
function showError(message) {
    const toast = new bootstrap.Toast(document.createElement('div'));
    console.error(message);
    // In a production app, you would show a proper toast notification
}

/**
 * Add fade-in animation
 */
const style = document.createElement('style');
style.textContent = `
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
    
    .forecast-card {
        animation: fadeIn 0.5s ease forwards;
        opacity: 0;
    }
`;
document.head.appendChild(style);
