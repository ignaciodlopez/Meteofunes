# MeteoFunes - Sistema de Scraping SMN

## 🎯 Implementación Completada

He implementado un **sistema de web scraping** para obtener datos meteorológicos reales del **Servicio Meteorológico Nacional (SMN)** de Argentina.

## 🔧 Componentes Creados

### 1. **SmnScraperService** (`app/Services/SmnScraperService.php`)
Servicio principal que realiza el scraping de https://www.smn.gob.ar/

**Características:**
- ✅ Extrae datos meteorológicos actuales
- ✅ Obtiene pronóstico extendido para Santa Fe
- ✅ Cacheo inteligente (30 minutos) para evitar sobrecarga
- ✅ Sistema de fallback con datos alternativos
- ✅ Parsing robusto con expresiones regulares
- ✅ Detección automática de condiciones climáticas

**Datos Extraídos:**
- Temperatura actual
- Sensación térmica
- Humedad
- Presión atmosférica
- Velocidad y dirección del viento
- Visibilidad
- Índice UV
- Condición climática (soleado, nublado, etc.)
- Pronóstico de 7 días

### 2. **WeatherController Actualizado**
El controlador ahora usa el servicio de scraping:
- `getCurrentWeather()` - Datos actuales desde SMN
- `getForecast()` - Pronóstico de 7 días
- `clearCache()` - Limpia el caché manualmente

### 3. **Comando de Prueba** (`app/Console/Commands/TestSmnScraper.php`)
Comando Artisan para probar el scraper:
```bash
php artisan weather:test-smn
```

## 📡 API Endpoints

### Obtener Clima Actual
```
GET /api/weather/current
```
Respuesta:
```json
{
  "temperature": 24,
  "feels_like": 22,
  "humidity": 65,
  "pressure": 1015,
  "wind_speed": 15,
  "wind_direction": "NE",
  "condition": "partly_cloudy",
  "description": "Parcialmente nublado",
  "location": "Funes, Santa Fe",
  "source": "Servicio Meteorológico Nacional"
}
```

### Obtener Pronóstico
```
GET /api/weather/forecast
```

### Limpiar Caché
```
POST /api/weather/clear-cache
```

## 🚀 Cómo Usar

1. **Acceder a la aplicación:**
   - Abre http://localhost:9000 en tu navegador
   - O abre `demo.html` directamente

2. **Probar el scraper:**
   ```bash
   php artisan weather:test-smn
   ```

3. **Ver logs en caso de error:**
   Los errores se registran en `storage/logs/laravel.log`

## ⚙️ Configuración del Caché

El caché se actualiza automáticamente cada **30 minutos**. Para cambiar este tiempo, edita `SmnScraperService.php`:

```php
private $cacheTime = 1800; // segundos (30 minutos)
```

## 🔍 Cómo Funciona el Scraping

1. **Solicitud HTTP** al sitio del SMN
2. **Parsing del HTML** con expresiones regulares
3. **Extracción de datos** específicos (temperatura, humedad, etc.)
4. **Normalización** de los datos
5. **Cacheo** para evitar múltiples solicitudes
6. **Fallback** a datos generados si hay error

## 📝 Notas Importantes

- ✅ **Respetuoso con el servidor**: Usa caché para minimizar solicitudes
- ✅ **Robusto**: Sistema de fallback si el scraping falla
- ✅ **Específico para Argentina**: Optimizado para SMN.gob.ar
- ✅ **Datos reales**: Información actualizada del servicio oficial
- ⚠️ **Limitación**: Depende de la estructura HTML del SMN (puede requerir actualización si cambia)

## 🎨 Frontend

La aplicación web ya está configurada para usar estos datos:
- JavaScript hace llamadas a `/api/weather/current` y `/api/weather/forecast`
- Se actualiza automáticamente cada 5 minutos
- Muestra datos en tiempo real del SMN

## 🔄 Próximas Mejoras Sugeridas

1. **Alertas Meteorológicas**: Scrapear alertas del SMN
2. **Imágenes Satelitales**: Integrar imágenes del radar
3. **Históricos**: Guardar datos en base de datos
4. **Gráficos**: Visualización de tendencias
5. **Múltiples Ciudades**: Expandir a otras localidades

---

**Estado**: ✅ **FUNCIONANDO**  
**Servidor**: http://localhost:9000  
**Fuente de Datos**: Servicio Meteorológico Nacional (SMN.gob.ar)
