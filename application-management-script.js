function showSection(sectionId) {
    // Hide all content sections
    document.getElementById('dashboard-content').style.display = 'none';
    document.getElementById('application-management').style.display = 'none';
    

    // Hide all section headings
    const allHeadings = document.querySelectorAll('.content > .heading-body');
    allHeadings.forEach(heading => heading.style.display = 'none');

    // Show the selected section and its heading
    const section = document.getElementById(sectionId);
    section.style.display = 'block';
    section.previousElementSibling.style.display = 'block'; // Show the heading
}
