const checkbox = document.querySelector('input[name=genreCheckbox]');
var displayedGenres = [];

for (var i = 0; i < checkbox.length; i++) {
    checkbox[i].addEventListener('change', filterMovies);
}

function filterMovies(e) {alert('checked');
    if (e.currentTarget.checked) {
        alert('checked');
      } else {
        alert('not checked');
      }
}