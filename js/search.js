var searchForm;

window.onload = searchInit;

function searchInit() {
	searchForm = document.querySelector('#networkSearchForm');
    searchForm.classList.remove("d-inline-flex");
    searchForm.style.display = "none";

    let inputStandard = document.querySelector("#searchStandard");
    let inputNews = document.querySelector("#searchNews");
    let inputBlogs = document.querySelector("#searchBlogs");
    let switchStandard = document.querySelector("#searchStandardSwitch");
    let switchNews = document.querySelector("#searchNewsSwitch");
    let switchBlogs = document.querySelector("#searchBlogsSwitch");



    switchStandard.addEventListener('click', function(evt) {
        if (inputStandard.value == 'true') {
            inputStandard.value = 'false';
            switchStandard.checked = false;
        } else {
            inputStandard.value = 'true';
            switchStandard.checked = true;
        }
    })

    switchNews.addEventListener('click', function(evt) {
        if (inputNews.value == 'true') {
            inputNews.value = 'false';
            switchNews.checked = false;
        } else {
            inputNews.value = 'true';
            switchNews.checked = true;
        }
    })

    switchBlogs.addEventListener('click', function(evt) {
        if (inputBlogs.value == 'true') {
            inputBlogs.value = 'false';
            switchBlogs.checked = false;
        } else {
            inputBlogs.value = 'true';
            switchBlogs.checked = true;
        }
    })

}