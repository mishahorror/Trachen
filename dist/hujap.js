const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
	// toggle the type attribute
	const type = password.getAttribute("type") === "password" ? "text" : "password";
	password.setAttribute("type", type);
	// toggle the icon
	this.classList.toggle("bi-eye");
});







const togglePassword_registration = document.querySelector("#togglePassword_registration");
const password_registration = document.querySelector("#password_registration");

togglePassword_registration.addEventListener("click", function () {
	// toggle the type attribute
	const types = password_registration.getAttribute("type") === "password" ? "text" : "password";
	password_registration.setAttribute("type", types);
	// toggle the icon
	this.classList.toggle("bi-eye");
});

// prevent form submit
const formr = document.querySelector("form");
formr.addEventListener('submit',function(e){
	e.preventDefault();
});
