# MeteoFunes

Aplicación web moderna para mostrar información meteorológica de **Funes, Santa Fe, Argentina**.

## 🌤️ Características

- **Diseño moderno y atractivo** con animaciones suaves
- **Responsive design** compatible con todos los dispositivos
- **Datos en tiempo real** del clima actual
- **Pronóstico extendido** de 7 días
- **Interfaz intuitiva** y fácil de usar
- **Colores vibrantes** con gradientes modernos

## 🚀 Tecnologías Utilizadas

- **Laravel 11** - Framework PHP
- **Bootstrap 5.3** - Framework CSS
- **Vite** - Build tool
- **Bootstrap Icons** - Iconografía
- **JavaScript (ES6+)** - Interactividad

## 📋 Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM o Yarn

## 🔧 Instalación

1. **Clonar el repositorio**
```bash
git clone <url-del-repositorio>
cd meteofunes
```

2. **Instalar dependencias de PHP**
```bash
composer install
```

3. **Instalar dependencias de Node**
```bash
npm install
```

4. **Configurar el archivo .env**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Compilar assets**
```bash
npm run dev
```

6. **Ejecutar el servidor de desarrollo**
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## 🎨 Estructura del Proyecto

```
meteofunes/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── Controller.php
│           └── WeatherController.php
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── weather/
│           └── index.blade.php
├── routes/
│   ├── web.php
│   └── console.php
└── public/
```

## 🌐 API Endpoints

- `GET /` - Página principal
- `GET /api/weather/current` - Datos del clima actual
- `GET /api/weather/forecast` - Pronóstico de 7 días

## 🎯 Características Principales

### Clima Actual
- Temperatura actual y sensación térmica
- Humedad relativa
- Velocidad y dirección del viento
- Presión atmosférica
- Índice UV
- Horarios de amanecer y atardecer

### Pronóstico Extendido
- Pronóstico de 7 días
- Temperaturas máximas y mínimas
- Probabilidad de precipitación
- Condiciones climáticas por día

## 🎨 Personalización

### Colores y Estilos
Los colores principales se pueden modificar en `resources/css/app.css`:

```css
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
```

### API del Clima
Para usar datos reales, configura una API key en `.env`:

```env
WEATHER_API_KEY=tu_api_key
WEATHER_API_URL=https://api.openweathermap.org/data/2.5
WEATHER_LOCATION=Funes,AR
```

## 📱 Responsive Design

La aplicación está optimizada para:
- 📱 Smartphones (320px+)
- 📱 Tablets (768px+)
- 💻 Laptops (1024px+)
- 🖥️ Desktops (1440px+)

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT.

## 👨‍💻 Autor

Desarrollado con ❤️ para la ciudad de **Funes, Santa Fe**

## 🙏 Agradecimientos

- Bootstrap por el excelente framework CSS
- Laravel por el poderoso framework PHP
- La comunidad open source

---

⭐ Si te gusta este proyecto, no olvides darle una estrella en GitHub!
