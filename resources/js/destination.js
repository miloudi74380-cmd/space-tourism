// Données des destinations (récupérées depuis les traductions Laravel)
const getDestinations = () => {
    const trans = window.translations?.destinations || {};
    return {
        moon: {
            name: trans.moon?.name || "Moon",
            image: "/assets/destination/image-moon.png",
            imageWebp: "/assets/destination/image-moon.webp",
            description: trans.moon?.description || "",
            distance: trans.moon?.distance || "",
            travel: trans.moon?.travel || ""
        },
        mars: {
            name: trans.mars?.name || "Mars",
            image: "/assets/destination/image-mars.png",
            imageWebp: "/assets/destination/image-mars.webp",
            description: trans.mars?.description || "",
            distance: trans.mars?.distance || "",
            travel: trans.mars?.travel || ""
        },
        europa: {
            name: trans.europa?.name || "Europa",
            image: "/assets/destination/image-europa.png",
            imageWebp: "/assets/destination/image-europa.webp",
            description: trans.europa?.description || "",
            distance: trans.europa?.distance || "",
            travel: trans.europa?.travel || ""
        },
        titan: {
            name: trans.titan?.name || "Titan",
            image: "/assets/destination/image-titan.png",
            imageWebp: "/assets/destination/image-titan.webp",
            description: trans.titan?.description || "",
            distance: trans.titan?.distance || "",
            travel: trans.titan?.travel || ""
        }
    };
};

const destinations = getDestinations();

// Fonction pour changer de destination
function changeDestination(destinationKey) {
    const destination = destinations[destinationKey];

    if (!destination) return;

    // Mettre à jour l'image
    const planetImage = document.getElementById('planet-image');
    if (planetImage) {
        planetImage.src = destination.image;
        planetImage.alt = destination.name;
    }

    // Mettre à jour le nom
    const planetName = document.getElementById('planet-name');
    if (planetName) {
        planetName.textContent = destination.name;
    }

    // Mettre à jour la description
    const planetDescription = document.getElementById('planet-description');
    if (planetDescription) {
        planetDescription.textContent = destination.description;
    }

    // Mettre à jour la distance
    const planetDistance = document.getElementById('planet-distance');
    if (planetDistance) {
        planetDistance.textContent = destination.distance;
    }

    // Mettre à jour le temps de voyage
    const planetTravel = document.getElementById('planet-travel');
    if (planetTravel) {
        planetTravel.textContent = destination.travel;
    }

    // Mettre à jour les onglets actifs
    document.querySelectorAll('[data-destination]').forEach(tab => {
        const isActive = tab.dataset.destination === destinationKey;

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
            const destinationKey = this.dataset.destination;
            changeDestination(destinationKey);
        });
    });

    // Charger la première destination (Moon) par défaut
    changeDestination('moon');
});
