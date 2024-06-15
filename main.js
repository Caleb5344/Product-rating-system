document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rating-star');
    const ratingResult = document.getElementById('ratingResult');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const ratingValue = this.getAttribute('data-value');
            fetch('submit_rating.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ rating: ratingValue })
            })
            .then(response => response.json())
            .then(data => {
                ratingResult.innerHTML = `Rating submitted: ${data.rating}`;
                stars.forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                this.previousElementSibling && this.previousElementSibling.classList.add('selected');
            })
            .catch(error => {
                ratingResult.innerHTML = `Error: ${error}`;
            });
        });
    });
});
