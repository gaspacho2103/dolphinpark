const anchors = document.querySelectorAll(".smooth-btn, .link, .link-primary");

anchors.forEach(anch => {
	anch.addEventListener("click", function(event) {
		event.preventDefault();

		const id = anch.getAttribute("href");

		const elem = document.querySelector(id);

		window.scroll({
			top: elem.offsetTop - 150,
			behavior: 'smooth'
		})
	})
})