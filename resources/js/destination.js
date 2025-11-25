// Récupérer les données des planètes depuis la base de données
const getPlanets = () => {
    return window.planetsData || {};
};

// Récupérer la locale actuelle
const getLocale = () => {
    return document.documentElement.lang || 'en';
};

// Fonction pour obtenir le nom de la planète selon la locale
const getPlanetName = (planet) => {
    const locale = getLocale();
    return planet[`name_${locale}`] || planet.name_en;
};

// Fonction pour obtenir la description de la planète selon la locale
const getPlanetDescription = (planet) => {
    const locale = getLocale();
    return planet[`description_${locale}`] || planet.description_en;
};

// Fonction pour obtenir la distance de la planète selon la locale
const getPlanetDistance = (planet) => {
    const locale = getLocale();
    return planet[`distance_${locale}`] || planet.distance_en;
};

// Fonction pour obtenir le temps de voyage de la planète selon la locale
const getPlanetTravel = (planet) => {
    const locale = getLocale();
    return planet[`travel_${locale}`] || planet.travel_en;
};

// Fonction pour changer de destination
function changeDestination(planetId) {
    const planets = getPlanets();
    const planet = planets[planetId];

    if (!planet) return;

    // Mettre à jour l'image
    const planetImage = document.getElementById('planet-image');
    if (planetImage) {
        planetImage.src = planet.image;
        planetImage.alt = getPlanetName(planet);
    }

    // Mettre à jour le nom
    const planetName = document.getElementById('planet-name');
    if (planetName) {
        planetName.textContent = getPlanetName(planet);
    }

    // Mettre à jour la description
    const planetDescription = document.getElementById('planet-description');
    if (planetDescription) {
        planetDescription.textContent = getPlanetDescription(planet);
    }

    // Mettre à jour la distance
    const planetDistance = document.getElementById('planet-distance');
    if (planetDistance) {
        planetDistance.textContent = getPlanetDistance(planet);
    }

    // Mettre à jour le temps de voyage
    const planetTravel = document.getElementById('planet-travel');
    if (planetTravel) {
        planetTravel.textContent = getPlanetTravel(planet);
    }

    // Mettre à jour les onglets actifs
    document.querySelectorAll('[data-destination]').forEach(tab => {
        const isActive = tab.dataset.destination == planetId;

        if (isActive) {
            tab.classList.remove('text-[#D0D6F9]', 'border-transparent', 'hover:border-white/50');
            tab.classList.add('text-white', 'border-white');
        } else {
            tab.classList.remove('text-white', 'border-white');
            tab.classList.add('text-[#D0D6F9]', 'border-transparent', 'hover:border-white/50');
        }
    });
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter les événements de clic sur les onglets
    document.querySelectorAll('[data-destination]').forEach(tab => {
        tab.addEventListener('click', function() {
            const planetId = this.dataset.destination;
            changeDestination(planetId);
        });
    });

    // Charger la première planète par défaut (premier bouton)
    const firstTab = document.querySelector('[data-destination]');
    if (firstTab) {
        const firstPlanetId = firstTab.dataset.destination;
        changeDestination(firstPlanetId);
    }
});
