window.onload = searchInit;

function searchInit() {

    // Hide the searchform in the header
	let searchForm = document.querySelector('#networkSearchForm');
    searchForm.classList.remove("d-inline-flex");
    searchForm.style.display = "none";

    // Hidden input fields in searchform
    let inputStandard = document.querySelector("#searchStandard");
    let inputNews = document.querySelector("#searchNews");
    let inputBlogs = document.querySelector("#searchBlogs");
    
    // 'Switch' selector page elements
    let switchStandard = document.querySelector("#searchStandardSwitch");
    let switchNews = document.querySelector("#searchNewsSwitch");
    let switchBlogs = document.querySelector("#searchBlogsSwitch");

    // Change values for standard content searches
    switchStandard.addEventListener('click', function(evt) {
        if (inputStandard.value == 'true') {
            inputStandard.value = 'false';
            switchStandard.checked = false;
        } else {
            inputStandard.value = 'true';
            switchStandard.checked = true;
        }
    })

    // Change values for news articles searches
    switchNews.addEventListener('click', function(evt) {
        if (inputNews.value == 'true') {
            inputNews.value = 'false';
            switchNews.checked = false;
        } else {
            inputNews.value = 'true';
            switchNews.checked = true;
        }
    })

    // Change values for blog post searches
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