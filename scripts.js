
    document.addEventListener("DOMContentLoaded", () => {
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    });


    $(document).ready(function(){
        $('.carousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    });


    async function searchModels() {
        const name = document.getElementById('search-name').value;

        const response = await fetch(`/search?name=${name}`);
        const models = await response.json();

        const resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = ''; // Очистить предыдущие результаты

        if (models.length === 0) {
            resultsContainer.innerHTML = '<p>Нет моделей, соответствующих вашему запросу.</p>';
            return;
        }

        models.forEach(model => {
            const modelElement = document.createElement('div');
            modelElement.classList.add('search-item');
            modelElement.innerHTML = `
                <img src="${model.image_url}" alt="${model.name}">
                <h3>${model.name}</h3>
                <p>${model.description}</p>
            `;
            resultsContainer.appendChild(modelElement);
        });
    }