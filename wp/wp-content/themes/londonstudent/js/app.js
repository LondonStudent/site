var showNav = function(event) {
	event.preventDefault()
	document.getElementById('site-canvas').classList.toggle('site-canvas--active')
}

var navToggle = document.getElementById('nav-toggle')

navToggle.addEventListener('click', showNav)
