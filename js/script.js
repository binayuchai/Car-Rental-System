var nav_menu = document.querySelectorAll(".nav-link");

let navbarCollapse = document.querySelectorAll(".navbar-collapse");

nav_menu.forEach(navElement => {
    navElement.addEventListener('click', () => {
        navbarCollapse.classList.remove("show");
    })
});





/* Counter */

function counter(countId, target) {
    let count = 1;
    setInterval(() => {
        if (count < target) {
            count++;
            document.getElementById(countId).innerHTML = count;
        }


    }, 1)

}
document.addEventListener('DOMContentLoaded', () => {

    counter("count1", 40);
    counter("count2", 300);
    counter("count3", 80);
})