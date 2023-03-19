function openTab(evt, contentId) {
    // Declare all variables
    var i, tabcontents, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontents = document.querySelectorAll(".tabcontent");
    tabcontents.forEach(tabcontent => {
        if (tabcontent.id[2] == evt.target.id[0]) {
            tabcontent.classList.remove('active');
        }
    });
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.querySelectorAll(".tablinks");
    tablinks.forEach(tablink => {
        if (tablink.id != evt.target.id && evt.target.id[0] == tablink.id[0]) {
            tablink.classList.remove('active');
        }
    });

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(`c-${contentId}`).classList.add('active');
    evt.currentTarget.className += " active";
} 