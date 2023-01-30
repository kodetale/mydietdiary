function showLeftMenu(){
	var leftMenuObj = document.getElementById('hideMenuBodyId');
  leftMenuObj.style['opacity'] = "100%";
  leftMenuObj.style['pointer-events'] = "auto";
}

function closeLeftMenu() {
	var leftMenuObj = document.getElementById('hideMenuBodyId');
  leftMenuObj.removeAttribute("style");
}