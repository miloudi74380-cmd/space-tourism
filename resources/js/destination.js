// Données des destinations
const destinations = {
    moon: {
        name: "Moon",
        image: "/assets/destination/image-moon.png",
        imageWebp: "/assets/destination/image-moon.webp",
        description: "See our planet as you've never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you're there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
        distance: "384,400 km",
        travel: "3 days"
    },
    mars: {
        name: "Mars",
        image: "/assets/destination/image-mars.png",
        imageWebp: "/assets/destination/image-mars.webp",
        description: "Don't forget to pack your hiking boots. You'll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It's two and a half times the size of Everest!",
        distance: "225 mil. km",
        travel: "9 months"
    },
    europa: {
        name: "Europa",
        image: "/assets/destination/image-europa.png",
        imageWebp: "/assets/destination/image-europa.webp",
        description: "The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover's dream. With an icy surface, it's perfect for a bit of ice skating, curling, hockey, or simple relaxation in your snug wintery cabin.",
        distance: "628 mil. km",
        travel: "3 years"
    },
    titan: {
        name: "Titan",
        image: "/assets/destination/image-titan.png",
        imageWebp: "/assets/destination/image-titan.webp",
        description: "The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few hundred degrees colder!). As a bonus, you get striking views of the Rings of Saturn.",
        distance: "1.6 bil. km",
        travel: "7 years"
    }
};

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
